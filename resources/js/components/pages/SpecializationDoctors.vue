<template>
  <div>

  </div>
</template>

<script>
export default {
name: 'SpecializationDoctors',
data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/doctors/',
      doctors: []
    }
  },
  mounted(){
    this.getApi();
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl + this.$route.params.slug)
      .then(res => {
        this.doctors = res.data;
        console.log(this.doctors);
      })
    }
  }
}
</script>

<style lang="scss" scoped>

</style>