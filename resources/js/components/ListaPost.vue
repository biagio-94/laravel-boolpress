<template>
  <div>
    <h1 class="py-5" v-if="!isVisible">Lista Post Totali: </h1>
    <h1 class="py-5" v-else>Post di: {{ nomeUserPost }}</h1>
    <div class="row row-cols-3">
      <div class="col" v-for="post in posts" :key="post.id">
        <div style="color: white" class="card mb-3 bg-dark">
          <div class="card-body">
            <h3 class="card-title">{{ post.name }}</h3>
            <p class="card-text">
              {{ post.content }}
            </p>
            <a to="#" class="card-link" @click="filterPost(post.user_id, post.user.name)">{{
              post.user.name
            }}</a>
            <router-link
              class="btn btn-primary d-block mt-3"
              :to="{ name: 'post.show', params: { id: post.id } }"
              >Dettagli</router-link
            >
          </div>
        </div>
      </div>
    </div>
    <div
      class="text-center"
      :class="isVisible ? `d-none` : ``"
      v-if="paginationData.current_page < paginationData.last_page"
    >
      <button class="btn btn-success" @click="loadOldPost()">
        Carica altri post
      </button>
    </div>
    <div class="text-center" :class="isVisible ? `` : `d-none`">
      <button class="btn btn-success" @click="fetchdata(1)">Indietro</button>
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
      paginationData: {},
      isVisible: false,
      nomeUserPost: "",
    };
  },
  methods: {
    filterPost(idUtente,nomeUtente) {
      axios.get("/api/users/" + idUtente).then((resp) => {
        this.posts = [];
        this.posts.push(...resp.data);
        this.isVisible = true;
      });
      this.nomeUserPost = nomeUtente;
    },
    loadOldPost() {
      const currentPage = this.paginationData.current_page;
      this.fetchdata(currentPage + 1);
    },
    fetchdata(page = 1) {
      if (this.isVisible) {
        this.posts = [];
        this.isVisible = false;
      }
      axios.get("/api/posts?page=" + page).then((resp) => {
        console.log("posts", resp.data.data);
        console.log("pagination", resp.data);

        this.posts.push(...resp.data.data);
        this.paginationData = resp.data;
      });
    },
  },
  mounted() {
    this.fetchdata();
  },
};
</script>