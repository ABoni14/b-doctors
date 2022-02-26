<template>
  <div class="advanced-search">
    <div class="container-fluid">
      <div class="container">
        <div class="row flex-column justify-content-center align-items-center">
          <div class="container-img">
            <img src="https://img.freepik.com/free-vector/patients-doctors-meeting-waiting-clinic-hall-hospital-interior-illustration-with-reception-person-wheelchair-visiting-doctor-office-medical-examination-consultation_74855-8496.jpg?w=1060" alt="">
          </div>
          <div class="search-bar w-50">
            <select class="custom-select">
              <option selected>Scegli la specializzazione</option>
              <option value="1">Cardiologia</option>
              <option value="2">Neurologia</option>
              <option value="3">Ortopedia</option>
              <option value="4">Dermatologia</option>
              <option value="5">Pediatria</option>
              
            </select>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AdvancedSearch"
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