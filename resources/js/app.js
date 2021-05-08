

require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import { routes } from './routes'

import Form from './form'
window.Form = Form

import storeData from './store/index'

import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);

import Vuex from 'vuex'

Vue.use(Vuex)

// momemt js

import moment from 'moment'
import Vue from 'vue';
Vue.filter('timeformat', (arg)=>{
   return moment(arg).format("MMM Do YYYY");
})

Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

const store = new Vuex.Store(
      storeData
)

const router = new VueRouter({
    routes,
    
    
})



const app = new Vue({
    el: '#app',
    router,
    store
});
