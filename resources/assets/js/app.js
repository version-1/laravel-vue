import Vue from 'vue';
import VueRouter from 'vue-router';

require('./bootstrap');

Vue.use(VueRouter);

Vue.component('navbar',require('./components/Layouts/NavHeader.vue'));
Vue.component('nav-footer', require('./components/Layouts/NavFooter.vue'));

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: require('./components/Articles/Index.vue') },
        { path: '/books', component: require('./components/Articles/Index.vue') },
        { path: '/authores', component: require('./components/Authores/Index.vue') },
    ]
});

const app = new Vue({
    router,
    el: '#app',
});
