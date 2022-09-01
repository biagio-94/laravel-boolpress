import Vue from "vue";
import Frontend from "./Frontend.vue";

import router from "./router"
require('./bootstrap');

new Vue({
  el: "#app",
  render: h => h(Frontend),
  router
  
})