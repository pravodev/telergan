
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Echo from 'laravel-echo'

require('./bootstrap');

window.Vue = require('vue');
window.Echo =  new Echo({
    broadcaster: 'pusher',
    key: '218b503c8d1f1fb85e63',
    cluster: 'ap1',
    encrypted: true
})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message', require('./components/message.vue'));

const app = new Vue({
    el: '#app',
    data: {
        message: '',
        chat: {
            message: [],
        }
    },
    methods: {
        send(){
            if(this.message.length > 0){
                this.chat.message.push(this.message);
                this.message = '';
            }
        }
    }
});
