
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueMaterial from 'vue-material';

Vue.use(VueRouter);
Vue.use(VueMaterial);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './components/App.vue';

import Login from './components/Auth/Login.vue';

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/login',
            component: Login
        }
    ]
});

const app = new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
});
