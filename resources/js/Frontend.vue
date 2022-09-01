<template>
  <div>
    <TheNavbar></TheNavbar>
   <!--  <ListaPost></ListaPost> -->
    <router-view></router-view>
  </div>
</template>



<script>
import axios from "axios";
import ListaPost from "./components/ListaPost.vue";
import TheNavbar from "./components/TheNavbar.vue";

export default {
    
    components: { ListaPost, TheNavbar }
};
</script>

<style>
</style>