require('./bootstrap');

window.Vue = require('vue');

Vue.component('title-field', require('./components/TitleField.vue'));

const app = new Vue({
    el: '#app'
});
