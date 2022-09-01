<template>
  <div>
    <h1>{{ post[1].id }}</h1>
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
      axios.get("/api/posts" ).then((resp) => {
        console.log(resp.data);
        this.post = resp.data;
      });
    },
  },
  mounted() {
    this.fetchdata();
  },
};
</script>