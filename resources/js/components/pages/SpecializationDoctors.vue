<template>
  <div>
      <!-- <router-link :to="{name: 'detail', params: {slug: specializationSlug}}">
        {{post.title}}
      </router-link> -->

      <div class="container">
        <div class="row">
          <div 
          v-for="(singleSpecialization, index) in specialization"
          :key="index"
          @click="$emit('specialization', specialization)"
          class="col-6">
            <a href="">{{singleSpecialization.name}}</a>
          </div>
        </div>
      </div>

      <CardsDoctors 
      :specializationSlug= specializationSlug
      />
  </div>
</template>

<script>
import CardsDoctors from './CardsDoctors.vue'

export default {
  name: 'SpecializationDoctors',
  props: {
    specialization: Object
  },
  components:{
    CardsDoctors
  },
  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/doctors/',
      specialization: []
    }
  },
  mounted(){
    this.getApi();
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl)
      .then(res => {
        this.specialization = res.data.specialization;
        console.log('specialization',this.specialization);
        console.log('specializationSlug',this.specialization.slug);
      })
    }
  }
}
</script>

<style lang="scss" scoped>

</style>