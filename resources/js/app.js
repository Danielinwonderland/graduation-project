require('./bootstrap');

require('alpinejs');

window.Vue = require('vue').default;

Vue.component('chat-messages', require('./components/ChatMessages.vue').default);

Vue.component('chat-form', require('./components/ChatForm.vue').default);

import moment from 'moment';

Vue.filter('formatDate', function(value) {
    if (value) {
            return moment(String(value)).format('DD.MM.YYYY hh:mm')
    }
});

const app = new Vue({
    el: '#app',
    data: {
            messages: []
    },
    created() {
            this.fetchMessages();
    },
    methods: {
        fetchMessages() {
                axios.get('/messages').then(response => {
                    this.messages = response.data;
            });
        },
        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {
              console.log(response.data);
            });
        }
    }
});
