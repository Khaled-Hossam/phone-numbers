require('./bootstrap');

import VueRouter from 'vue-router';
import routes from './routes';
import Vue from 'vue';
import App from './layouts/App.vue';
import { BootstrapVue } from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(BootstrapVue)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router: new VueRouter(routes),
    el: '#app',
    render: h => h(App)
});
