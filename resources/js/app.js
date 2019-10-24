/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.axios = require('axios')


window.Vue = require('vue');
import store from './store'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

Vue.component('hero-component', require('./components/HeroComponent.vue').default);
Vue.component('monster-component', require('./components/MonsterComponent.vue').default);
Vue.component('v-select', vSelect)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});
