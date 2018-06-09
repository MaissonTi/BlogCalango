
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
import Money from 'v-money';

Vue.use(Vuex);
Vue.use(Money, {precision: 4})


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 //Vuex
 const store = new Vuex.Store({
    state:{
        itens:{}
    },
    mutations:{
        setItens(state,obj){
            state.itens = obj;
        }
    }
 });



Vue.component('example', require('./components/ExampleComponent.vue'));
Vue.component('v-input-dialog-list', require('./components/VInputDialogList.vue'));


const app = new Vue({
    el: '#app',
    store
});
