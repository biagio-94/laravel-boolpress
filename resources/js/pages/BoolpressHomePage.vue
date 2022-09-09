<template>
  <div>
    <Jumbotrone></Jumbotrone>
    <div class="container py-4">
      <div class="text-center">
        <h2>Crea il tuo blog persoalizzato</h2>
        <p class="py-2">
          Registrandoti potrai gestire i tuoi posts ed i tuoi utenti in totale autonomia.
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import Jumbotrone from "../components/Jumbotrone.vue";
export default {
  components: { Jumbotrone },
};
</script>


<style lang="scss">
.container {
  color: black;
}
</style>