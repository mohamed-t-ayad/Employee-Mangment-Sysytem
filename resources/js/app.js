require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';


import VueRouter from 'vue-router';
Vue.use(VueRouter);
import { routes } from './routes';
Vue.component(
    'employee-index',
    require('./components/employees/index.vue').default
);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router
});
