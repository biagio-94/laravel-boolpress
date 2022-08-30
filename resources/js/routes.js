
import Home from "./pages/home.vue"
import Contacts from "./pages/contacts.vue"
import PostShow from "./pages/posts/show.vue"

export const routes = [
  { path: "/", component: Home, name: "home" },
  { path: "/contatti", component: Contacts, name: "contacts" },
  { path: "/posts/:slug", component: PostShow, name: "posts.show" },
]