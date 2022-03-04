<template>
  <div>
    <Header />
    <router-view></router-view>
    <Footer />
  </div>
</template>

<script>
import Header from "./components/partials/Header.vue";
import Footer from "./components/partials/Footer.vue";
export default {
  name: "App",
  // data(){
  //     return{
  //       apiUrl: 'http://127.0.0.1:8000/api/doctors/specialization/',
  //       doctors: []
  //     }
  //   },
  components:{
    Header,
    Footer
  },
  // methods:{
  //   getApi(){
  //     // console.log('apiurl',this.apiUrl + 'radioterapia');
  //     axios.get(this.apiUrl + this.$route.params.slug)
  //     .then(res => {
  //       this.doctors = res.data;
        
  //     })
  //   }
  // }
}
</script>

<style lang="scss">

</style>