<!DOCTYPE html>
<html class="no-js" lang="">

<head>


  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <!-- Icono -->
  <!-- <link rel="icon" href="{{asset('/images/icono.png')}}" type="image/png" /> -->

  <!-- Para Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

  <!-- Estilos DataTables -->
  <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap4.min.css')}}">

  <!-- Estilos propios -->
  <link rel="stylesheet" href="{{asset('css/normalize.css') }}">
  <link rel="stylesheet" href="{{asset('css/fonts.css') }}">

  <!-- Sweet Alert -->
  <script src="{{asset('js/sweetalert2.js') }}"></script>

  <!-- Laravel Mixin -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
  <script src="{{ mix('js/app.js') }}" defer></script>

  @routes
</head>

<body id="page-top">

  @inertia

  <!-- Jquery-->
  <script type="text/javascript" src="{{asset('js/jquery.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/jQuery.print.js') }}"></script>
  <!-- Camara-->
  <!-- <script src="{{asset('js/webcam.js')}}"></script> -->
  <!-- Fechas -->
  <script src="{{asset('js/moment.min.js')}}"></script>
  <!-- Scripts para Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <!-- Scripts para DataTables-->
  <script src="{{asset('datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{asset('datatables/JSZip-2.5.0/jszip.min.js') }}"></script>
  <script src="{{asset('datatables/dataTables.fixedColumns.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/Buttons-1.6.5/js/dataTables.buttons.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/Buttons-1.6.5/js/buttons.bootstrap4.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/Buttons-1.6.5/js/buttons.html5.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('datatables/Buttons-1.6.5/js/buttons.print.min.js') }}"></script>

</body>

</html>