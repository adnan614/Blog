

require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import { routes } from './routes'

import Form from './form'
window.Form = Form


Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);



const router = new VueRouter({
    routes,
    
    
})



const app = new Vue({
    el: '#app',
    router
});
