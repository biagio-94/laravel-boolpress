<template>
  <div>
   <!--  <ListaPost></ListaPost> -->
    <router-view></router-view>
  </div>
</template>



<script>
import axios from "axios";
import ListaPost from "./components/ListaPost.vue";

export default {
    
    components: { ListaPost }
};
</script>

<style>
</style>