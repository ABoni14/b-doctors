<template>
  <div>
      <!-- <router-link :to="{name: 'detail', params: {slug: specializationSlug}}">
        {{post.title}}
      </router-link> -->

      <!-- <div class="container">
        <div class="row">
          <div
          v-for="(singleSpecialization, index) in specialization"
          :key="index"
          class="col-6">
            <a href="">{{singleSpecialization.name}}</a>
          </div>
        </div>
      </div> -->

      <CardsDoctors
        v-for="(doctor, index) in doctors"
        :key="index"
        :doctorInfo = 'doctor'
      />
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
        // console.log(this.specialization);
        // console.log(this.doctors);
      })
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
