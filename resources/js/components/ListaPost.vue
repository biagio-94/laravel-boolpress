<template>
  <div>
    <div class="row row-cols-3">
      <div class="col" v-for="name in posts" :key="name.id">
        <div style="color:white" class="card mb-3 bg-dark " >
          <div class="card-body">
            <h3 class="card-title">{{ name.name }}</h3>
            <p class="card-text">
              {{ name.content }}
            </p>
            <router-link
              class="btn btn-primary d-block mt-3"
              :to="{ name: 'post.show', params: { id: name.id } }"
              >Dettagli</router-link
            >
          </div>
        </div>
      </div>
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