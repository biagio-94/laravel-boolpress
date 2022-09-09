<template>
  <div class=" bgpost">
   
    
    <ListaPost></ListaPost>
  </div>
</template>

<script>
import ListaPost from '../components/ListaPost.vue';
export default { components: { ListaPost } };
</script>

<style lang="scss">
  .bgpost{
    height: 100vh;
    background-image: url("../../../public/storage/post_image/postsBackground.jpg");
    background-position: center;
    background-size: cover;
  }
</style>