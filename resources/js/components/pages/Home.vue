<template>
  <div class="container-fluid home">

    <!-- Carousel -->
    <div id="carouselExampleControls" class="carousel slide ab-carousel" data-ride="carousel">
      <div class="carousel-inner ab-inner">
        <div class="carousel-item active">
          <img src="https://www.centromedicomirandola.it/newcm/wp-content/uploads/2020/01/boh-1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://www.altroconsumo.it/-/media/altroconsumo/images/home/salute/diritti%20in%20salute/pediatra_shu_409317970_1600x900.jpg?rev=346e0a47-c527-44f0-aef0-e2a5f2916aa5&hash=E20754E8AB30F2EDACB21CEE91EF243D" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <!-- <img src="https://cdn.pixabay.com/photo/2021/10/11/17/37/doctor-6701410_960_720.jpg" class="d-block w-100" alt="..."> -->
          <img src="https://he.utexas.edu/images/easyblog_articles/243/GettyImages-823767128_high.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
    <!-- //Carousel -->

    <div class="container ab-container mt-5 mb-5">
      <!-- Search -->
      <div class="search d-flex">
        <div class="left-search">
          <!-- <img src="https://st2.depositphotos.com/3687485/12077/v/600/depositphotos_120776272-stock-illustration-different-doctors-charactsers-vector-set.jpg" alt=""> -->
          
          <img src="https://i.pinimg.com/564x/5f/d6/67/5fd667c10719a499c617b17b7553182b.jpg" alt="">
        </div>
        <div class="right-search d-flex flex-column justify-content-center">
          <h4 class="my-3">Prenota online la tua visita medica</h4>
          <div class="input-group mb-3">
            <input
            type="text"
            class="form-control"
            placeholder="Ricerca il medico per nome o specializzazione"
            aria-label="Recipient's username"
            aria-describedby="button-addon2"
            />
            <button class="btn btn-outline-primary" type="button" id="button-addon2">
              Cerca
            </button>
          </div>
        </div>
        <!-- <div class="left-search">
          <img src="https://i.pinimg.com/564x/5f/d6/67/5fd667c10719a499c617b17b7553182b.jpg" alt="">
        </div> -->
      </div>



      <!-- //Search -->
    </div>

    <div class="container container-info mt-5 mb-5">
      <div class="row justify-content-center">
        <h5>Come funziona BDoctors?</h5>
      </div>
      <div class="row justify-content-around align-items-center">
        <div class="col-3 img-info">
          <img src="https://i.pinimg.com/564x/9c/ed/db/9ceddb3bc9c39f16e49dd9f07493fac6.jpg" alt="">
          <div class="text-info d-flex flex-column justify-content-center align-items-center">
            <span class="title-info my-2">Trova lo specialista che fa per te</span>
            <p>Puoi scegliere il medico valutando il curriculum, le patologie trattate, le sue prestazioni ed il prezzo e le recensioni degli altri pazienti.</p>
          </div>
          
        </div>
        <div class="col-3 img-info d-flex flex-column justify-content-center align-items-center">
          <img src="https://i.pinimg.com/564x/d4/59/f6/d459f692eb585f435005a756a68534b5.jpg" alt="">
          <div class="text-info">
            <span class="title-info my-2">Invia un messaggio per avere un appuntamento</span>
            <p>Ci metterai un attimo: non serve telefonare e non è richiesta la carta di credito, pagherai direttamente in struttura.</p>
          </div>
        </div>
        <div class="col-3 img-info d-flex flex-column justify-content-center align-items-center">
          <img src="https://i.pinimg.com/564x/c5/1d/b5/c51db54a2a4b88f8b49b3d5737862428.jpg" alt="">
          <div class="text-info">
            <span class="title-info my-2">Affidati alle mani degli esperti</span>
            <p>Presentati alla visita nel giorno e nell'ora selezionati, successivamente se ti va potrai lasciare una recensione per aiutare nella scelta anche gli altri pazienti.</p>
          </div>
        </div>
  
      </div>


    </div>
    

  </div>
</template>

<script>
export default {
  name: "Home"
}
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_vars.scss';
.home{
  padding: unset;
  .ab-carousel{
    height: 450px;
    .ab-inner{
      height: 450px;
      width: 100vw;
      img{
        height: 500px;
        width: auto;
      
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
        input{
          border-radius: 10px 0 0 10px ;
        }
        h4{
          color: $primary-color;
        }
        button{
          border: 1px solid $primary-color;
          color: $primary-color;
          border-radius: 0 10px 10px 0;

          &:hover{
            background-color: $primary-color;
            color: white;
          }
        }
      }
    }
  }

  .container-info{

    h5{
      padding: 30px 0;
      color: $primary-color;
      font-size: 25px;
      margin: 0;
    }
    .img-info{
      text-align: center;
      
      img{
        height: 200px;
        width: 200px;
        border-radius: 50%;
        box-shadow: 10px 10px 5px #dedede;
      }
      .text-info{
        margin-top: 40px;
        .title-info{
          color: black;
          font-size: 20px;

        }
        p{
          color: black;
        }
      }
    }
  }
}
</style>