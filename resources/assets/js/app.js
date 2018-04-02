
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './Root';
import Axios from 'axios';
import _ from 'lodash';
import Vue from 'vue';
import VueChatScroll from 'vue-chat-scroll'
require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.set(Vue.prototype, '_',_);
 Vue.use(VueChatScroll)

const app = new Vue({
    el: '#app',
    data: {
        message: '',
        chat: {
            message: [],
            user: [],
            type: []
        },
        typing: ''
    },
    watch: {
        message(){
            Echo.private('chat')
            .whisper('typing', {
                message: this.message
            })
        }
    },
    methods: {
        getMessage(){
            return _.reverse(this.chat.message);
        },
        send(){
            if(this.message.length > 0){
                this.chat.message.push(this.message);
                this.chat.user.push('You');
                this.chat.type.push('sender');

                Axios.post('/send', {
                    message: this.message
                })
                .then(response => {
                    console.log("response ", response);
                    this.message = '';
                })
                .catch(error => {
                    console.log("error ", error);
                })
            }
        }
    },
    mounted(){
        console.log('mounted');
        Echo.private('chat')
        .listen('ChatEvent', (e) => {
            this.chat.message.push(e.message);
            this.chat.user.push(e.user);
            this.chat.type.push('receiver');
        })
        .listenForWhisper('typing', (e)=>{
            if(e.message !== ''){
                this.typing = 'typing...'
                console.log('typing')
            }else {
                this.typing = ''
            }
        });
    }
});
