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
          <a class="btn btn-primary my-5" href="#" role="button">Cerca</a>
        </div>
      </div>


      <!-- Form -->
        <form>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationServer01">Nome</label>
              <input type="text" class="form-control" id="validationServer01" placeholder="Nome" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="validationServer02">Cognome</label>
              <input type="text" class="form-control" id="validationServer02" placeholder="Cognome" required> 
            </div>
          
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationServer03" class="form-label">Scrivi il tuo messaggio:</label>
              <textarea class="form-control" id="validationServer03" required rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" required>
              <label class="form-check-label" for="invalidCheck3">
                Agree to terms and conditions
              </label>

            </div>
          </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>


      <!-- //Form -->



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