<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
{
    private $apiContext;
    public function _construct()
    {
        $payPalConfig = Config::get(key: 'paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['cliente_id'],
                $payPalConfig['secret'],
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    public function payWithPayPal()
    {
        // return "123";
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('3.99');
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('See your IQ results');

        $callbackUrl = url('/paypal/status');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        dd($request);
        // $congreso = DB::table('congresos')->first();
        $dni_registrado = Session::get('dni_registrado');
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            // Podríamos redirigir a la página que queramos
            $status = 'No se pudo proceder con el pago a través de Paypal';
            return redirect('/pago')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        // Ejecutar el pago
        $result = $payment->execute($execution, $this->apiContext);

        // dd($result);

        if ($result->getState() === 'approved') {

            // DB::table('usuarios')->where('dni', $dni_registrado)
            //     ->update(['pagado' => 1, 'totalPago' => $congreso->precio, 'id_pago' => $result->getId(), 'fecha_pago' => $result->getCreateTime()]);

            $status = 'Gracias! El pago a través de Paypal se ha realizado correctamente';
            return redirect('/menu')->with(compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de Paypal no se pudo realizar';
        return redirect('/menu')->with(compact('status'));
    }
}
