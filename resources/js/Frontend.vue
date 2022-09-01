<template>
  <div>
    <TheNavbar></TheNavbar>
   <!--  <ListaPost></ListaPost> -->
   <div class="container mt-5 py-5">
     
     <router-view></router-view>
    </div>
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