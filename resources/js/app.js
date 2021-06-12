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

import Vue from 'vue'

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

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import MyApp from './components/MyApp'

Vue.use(VueRouter)
Vue.use(Vuetify, {
    iconfont: 'fa4'
});

Vue.use(AxiosPlugin, { headers: httpHeaders})

 const app = new Vue(MyApp).$mount('#app');
