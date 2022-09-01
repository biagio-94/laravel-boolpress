<template>
  <div>
    <h1>{{ post.id }}</h1>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      post: {},
    };
  },
  methods: {
    fetchdata() {
      axios.get("/api/posts/" + this.$route.params.id).then((resp) => {
        
        this.post = resp.data;
      });
    },
  },
  mounted() {
    this.fetchdata();
  },
};
</script>