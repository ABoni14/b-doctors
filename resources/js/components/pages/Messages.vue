<template>
  <div class="container">
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
</template>

<script>
export default {
  name: 'Messages'
}
</script>


<style lang="scss"scoped>
@import '../../../sass/guest/_vars.scss';

</style>

