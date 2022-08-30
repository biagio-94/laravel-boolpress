<template>
  <div>
    <div v-for="name in posts" :key="name.id">
      <h1>{{ name.name }}</h1>
      <p>{{ name.content }}</p>
      
      <img :src="name.cover_img" alt="" width="250px">
    </div>
  </div>
</template>



<script>
import axios from "axios";

export default {
  data() {
    return {
      posts: [],
      message: "Ciao ciao con le mani",
    };
  },
  methods: {
    fetchdata() {
      axios.get("/api/posts").then((resp) => {
        this.posts = resp.data;
      });
    },
  },
  mounted() {
    this.fetchdata();
  },
};
</script>

<style>
</style>