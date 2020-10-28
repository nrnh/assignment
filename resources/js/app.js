/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('product-list', require('./components/ProductList.vue').default);

Vue.component('product-view', require('./components/ProductView.vue').default);

import Axios from 'axios';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue'
export const bus = new Vue();

const app = new Vue({
    
    el: '#app',
    
    data: {
        isHidden: false,
        cart: []
    },
    methods: {
        toggleHide() {
            this.isHidden = !this.isHidden
            bus.$emit('hide', this.isHidden);
        },
        countCart: function countCart() {
            var _this = this;
            axios.get('/countCart').then(function(response){
                _this.cart = response.data;
            });
        }
    },
    computed: {
        emptyCart() {
            return this.cart.length;
        }
    },
    mounted() {
        this.countCart();
    }
});

$("document").ready(function(){
    setTimeout(function(){
    $("div.alert").remove();
    }, 5000 );

});