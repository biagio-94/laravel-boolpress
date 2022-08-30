import Vue from "vue";
import Frontend from "./Frontend.vue";
import VueRouter from "vue-router";
import { routes } from "./routes"
Vue.use(VueRouter);
new Vue({
  el: "#app",
  render: h => h(Frontend),
  router: new VueRouter({
    routes,
    mode: "history"
  })
  
})