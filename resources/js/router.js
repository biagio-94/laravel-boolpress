import Vue from "vue"
import VueRouter from "vue-router"
import show from "./pages/posts/show.vue"
import PageNotFound from "./pages/PageNotFound.vue"
import BoolpressHomePage from "./pages/BoolpressHomePage.vue"

import home from "./pages/home.vue"

import contacts from "./pages/contacts.vue"


// deve comunicare a vue che vogliamo usare questa libreria
Vue.use(VueRouter)

// dobbiamo creare un array con le rotte
const routes = [
  /*
    path = URI da scrivere nella barra dell'indirizzo
    component = il componente da mostrare quando la pagina viene visualizzata
    name = nome da assegnare a questa rotta
  */
  { path: "/boolpress", component: BoolpressHomePage },
  { path: "/", component: home, name: "home.index" },

  { path: "/contatti", component: contacts, name: "contact.index" },
  { path: "/post/:id", component: show, name: "post.show" },
  { path: "*", component: PageNotFound },


]

// dobbiamo esportare un istanza di VueRouter() con le eventuali configurazioni
export default new VueRouter({
  // deve contenere un array di rotte
  routes,
  mode: "history"
})
