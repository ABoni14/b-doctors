<template>
  <div class="container-fluid home">

    <!-- Carousel -->
    <div id="carouselExampleControls" class="carousel slide ab-carousel" data-ride="carousel">
      <div class="carousel-inner ab-inner">
        <div class="carousel-item active">
          <img src="https://cdn.pixabay.com/photo/2021/10/03/03/47/doctor-6676747_960_720.jpg" class="d-block w-100 h-50" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://cdn.pixabay.com/photo/2020/05/14/02/31/covid-19-5169689_960_720.jpg" class="d-block w-100 h-50" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://cdn.pixabay.com/photo/2021/10/11/17/37/doctor-6701410_960_720.jpg" class="d-block w-100 h-50" alt="...">
        </div>
      </div>
    </div>
    <!-- //Carousel -->

    <div class="container ab-container mt-5 mb-5">
      <!-- Search -->
      <div class="search d-flex">
        <div class="left-search">
          <img src="https://cdn.pixabay.com/photo/2021/11/20/03/17/doctor-6810751_960_720.png" alt="">
        </div>
        <div class="right-search">
          <div class="input-group mb-3">
            <input
            type="text"
            class="form-control"
            placeholder="Ricerca il medico per nome o specializzazione"
            aria-label="Recipient's username"
            aria-describedby="button-addon2"
            />
            <button class="btn btn-outline-primary" type="button" id="button-addon2" data-mdb-ripple-color="dark">
              Cerca
            </button>
          </div>
        </div>
      </div>
      <!-- //Search -->
    </div>
    

  </div>
</template>

<script>
export default {
  name: "Home"
}
</script>

<style lang="scss" scoped>
.home{
  padding: unset;
  .ab-carousel{
    height: 400px;
    .ab-inner{
      height: 400px;
      img{
      height: 100% !important;
      object-position:100%;
      }
    }
  }
  .ab-container{
    .search{
      .left-search{
        width: 30%;
        img{
          width: 100%;
        }
      }
      .right-search{
        display: flex;
        align-items: center;
        width: 70%;
        margin-left: 20px;
      }
    }
  }
}
</style>