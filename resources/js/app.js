require('./bootstrap');
window.Swal = require("sweetalert2");

import { App, plugin } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";
import Vue from "vue";
import axios from "axios";
import Vuelidate from "vuelidate";

// InertiaProgress.init();

Vue.use(plugin);
Vue.prototype.$http = axios;
Vue.use(Vuelidate);
Vue.prototype.$route = (...args) => route(...args).url();
Vue.prototype.$route = route;

const el = document.getElementById("app");

new Vue({
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
    }),
}).$mount(el)
