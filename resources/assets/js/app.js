
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap'

import Vuetify from 'vuetify'

import VueRouter from 'vue-router'

import AxiosPlugin from './plugins/Axios'

let httpHeaders = {
    "X-Requested-With": "XMLHttpRequest"
};

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    httpHeaders['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Vue = require('vue');
Vue.use(VueRouter)
Vue.use(Vuetify, {
    iconfont: 'fa'
});

Vue.use(AxiosPlugin, { headers: httpHeaders})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import MyApp from './components/MyApp'

const app = new Vue(MyApp).$mount('#app');
