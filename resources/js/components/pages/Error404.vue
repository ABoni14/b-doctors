<template>
  <div class="container">
      <div class="row">
          <div class="col-12 text-center">
              <h2>Error 404</h2>
              <h3>Pagina non trovata!</h3>
              <a @click="backToHome()" href="">Torna alla Home Page</a>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: "Error404",
    methods: {
        backToHome(){
            this.$router.replace({name: 'home'})
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_vars.scss';

</style>
