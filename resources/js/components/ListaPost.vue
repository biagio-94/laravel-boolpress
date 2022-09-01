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
    <div class="text-center" v-if="paginationData.current_page < paginationData.last_page">
      <button class="btn btn-success" @click="loadOldPost()">Carica altri post</button>
      
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
      paginationData:{}
    };
  },
  methods: {
    loadOldPost(){
      const currentPage=this.paginationData.current_page
      this.fetchdata(currentPage +1)
    },
    fetchdata(page=1) {
      axios.get("/api/posts?page="+ page).then((resp) => {
        console.log("posts" , resp.data.data);
        console.log("pagination", resp.data);

        this.posts.push(...resp.data.data)
        this.paginationData=resp.data
      });
    },
  },
  mounted() {
    this.fetchdata();
  },
};
</script>