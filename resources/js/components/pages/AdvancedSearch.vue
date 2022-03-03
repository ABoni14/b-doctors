<template>
  <div class="advanced-search">
    <div class="container-fluid">
      <div class="container">
        <div class="row flex-column justify-content-center align-items-center">
          <div class="container-img">
            <img src="https://img.freepik.com/free-vector/patients-doctors-meeting-waiting-clinic-hall-hospital-interior-illustration-with-reception-person-wheelchair-visiting-doctor-office-medical-examination-consultation_74855-8496.jpg?w=1060" alt="">
          </div>

          <div class="container">
            <div class="row">
              <div 
              v-for="(singleSpecialization, index) in specialization"
              :key="index"
              class="col-6">
                <router-link :to="{name: 'SpecializationDoctors'}">{{singleSpecialization.name}}</router-link>
              </div>
            </div>

          </div>
          
          
          <a class="btn btn-primary my-5" href="#" role="button">Cerca</a>
        </div>
      </div>



    </div>
  </div>
</template>

<script>
export default {
  name: "AdvancedSearch",
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
        console.log(this.specialization);
      })
    }
  }

}
</script>

<style lang="scss" scoped>
.advanced-search{
  padding-bottom: 150px;
  .container{
    .container-img{
      height: 350px;
      width: 600px;
      img{
        height: 100%;
        width: 100%;
      }
    }
  }
}
</style>