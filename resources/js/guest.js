require('./bootstrap');
window.axios = require("axios");
window.Vue = require('vue');

import App from "./App.vue";
import router from "./routes"

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});

$(document).ready(function () {
    $('.third-button').on('click', function () {
  
      $('.animated-icon3').toggleClass('open');
    });
  });