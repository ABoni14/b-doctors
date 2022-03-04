<template>
  <div class="container my-4">

    <h2 class="text-center my-5 ">Ecco i dottori per {{specialization.name}}</h2>

    <div class="row justify-content-center">

        <CardsDoctors
        v-for="(doctor, index) in doctors"
        :key="index"
        :doctorInfo = 'doctor'/>
      
    </div>


      
  </div>
</template>

<script>
import CardsDoctors from './CardsDoctors.vue'

export default {
  name: 'SpecializationDoctors',
//   props: ['slug'],
  components:{
    CardsDoctors
  },
  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/doctors/specialization/',
      doctors: [],
      specialization: "",
      slug: this.$route.params.slug
    }
  },
  mounted(){
    this.getApi();
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl + this.slug)
      .then(res => {
        this.doctors = res.data.specialization.users;
        this.specialization = res.data.specialization;
        // console.log(this.specialization);
        console.log('specialization',this.specialization);
      })
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
