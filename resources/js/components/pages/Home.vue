<template>
  <div class="container-fluid home">

    <!-- Carousel -->


    <div id="carouselExampleCaptions" class="carousel slide carousel-fade ab-carousel" data-ride="carousel">

      <div class="carousel-inner ab-inner">
        <div class="carousel-item active">
          <img src="https://www.centromedicomirandola.it/newcm/wp-content/uploads/2020/01/boh-1.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block carousel-text">
            <h5>Prenota la tua visita online</h5>
            <p>Scegli tra più di 10 000 professionisti a tua disposizione.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://www.fpcgilfirenze.it/sindacato/wp-content/uploads/2018/01/fpcgilfirenze_medici.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block carousel-text">
            <h5>Chiedi al dottore</h5>
            <p> Risolvi i tuoi dubbi riguardanti la salute chiedendo agli specialisti suggeriti. Riceverai più risposte in modo completamente gratuito, solitamente entro 48h. </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://wallpapercave.com/wp/wp2469685.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block carousel-text">
            <h5>La tua opinione conta!</h5>
            <p>Consulta le recensioni degli ex pazienti per scegliere con più consapevolezza e lasciane una a tua volta dopo la visita. </p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon d-inline-block carousel-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon d-inline-block carousel-next-icon" aria-hidden="true"></span>
      </button>
    </div>

    <!-- //Carousel -->
    <!-- Search -->
    <div class="container ab-container mt-5 mb-5">

      <div class="search d-flex justify-content-center">

        <div class="right-search d-flex flex-column justify-content-center align-items-center">
          <h5 class="my-3 text-center title-section">Prenota online la tua visita medica</h5>
          <div class="input-group mb-3">
            <input
            type="text"
            class="form-control"
            list="specs"
            v-model="specToSearch"
            placeholder="Ricerca il medico per specializzazione"
            />
            <datalist id="specs">
                <option
                    v-for="(spec, index) in specs"
                    :key="index"
                    :value="spec.name"
                >{{spec.name}}</option>
            </datalist>
            <router-link :to="{ name: 'AdvancedSearch', params: {slug: this.output} }">
                <button
                    class="btn btn-doctors"
                    type="submit"
                    :disabled="this.checkedValue === false"
                    id="search"
                >Cerca</button>
            </router-link>
          </div>
        </div>

      </div>

    </div>
    <!-- //Search -->

    <!-- Dottori premium -->
    <div
    v-if="isLoading"
    class="container d-flex justify-content-center align-items-center">
      <Loader />
    </div>

    <div
    v-else
    class="container-fluid">

      <h5 class="text-center title-section">Medici in evidenza</h5>

      <div>
        <div class="d-flex flex-wrap justify-content-center">

          <Loader v-if="isLoading"/>
          <CardsDoctors
          v-for="(doctor, index) in doctors"
          :key="index"
          :doctorInfo="doctor"
          />
        </div>
      </div>

      <div class="navigation" >
        <button class="prev"
        @click="getDoctorsPremium(pagination.current - 1)"
        :disabled = "pagination.current === 1">
          <i class="fas fa-arrow-left"></i>
        </button>

        <button class="next"
        @click="getDoctorsPremium(pagination.current + 1)"
        :disabled = "pagination.current === pagination.last">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
    <!-- //Dottori premium -->

    <!-- Come funziona -->
    <div class="container-fluid bg-container">
      <div class="container container-info mt-5 mb-5">
      <div class="row justify-content-center">
        <h5 class="title-section">Come funziona BDoctors?</h5>
      </div>
      <div class="row justify-content-around align-items-center">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 img-info d-flex flex-column justify-content-center align-items-center mt-3">
          <img src="https://i.pinimg.com/564x/9c/ed/db/9ceddb3bc9c39f16e49dd9f07493fac6.jpg" alt="">
          <div class="text-info">
            <span class="title-info">Trova lo specialista che fa per te</span>
            <p>Puoi scegliere il medico valutando il curriculum, le patologie trattate, le sue prestazioni ed il prezzo e le recensioni degli altri pazienti.</p>
          </div>

        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 img-info d-flex flex-column justify-content-center align-items-center mt-3">
          <img src="https://i.pinimg.com/564x/d4/59/f6/d459f692eb585f435005a756a68534b5.jpg" alt="">
          <div class="text-info">
            <span class="title-info">Invia un messaggio per avere un appuntamento</span>
            <p>Ci metterai un attimo: non serve telefonare e non è richiesta la carta di credito, pagherai direttamente in struttura.</p>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 img-info d-flex flex-column justify-content-center align-items-center mt-3">
          <img src="https://i.pinimg.com/564x/c5/1d/b5/c51db54a2a4b88f8b49b3d5737862428.jpg" alt="">
          <div class="text-info">
            <span class="title-info">Affidati alle mani degli esperti</span>
            <p>Presentati alla visita nel giorno e nell'ora selezionati, successivamente se ti va potrai lasciare una recensione per aiutare nella scelta anche gli altri pazienti.</p>
          </div>
        </div>

      </div>

    </div>
    </div>
    <!-- //Come funziona -->

    <!-- Dicono di noi -->
    <div class="container-fluid container-fluid-us">
      <div class="container container-us">
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <h5 class="title-section">Dicono di noi</h5>
            <p>
              Oltre il 99% di pazienti soddisfatti <br><br>

              BDoctors è il primo sito in Italia di prenotazioni di visite mediche ed esami diagnostici, online dal 2008. <br><br>

              Crediamo nell'importanza dell'informazione e della trasparenza per aiutare i pazienti a scegliere il medico giusto tra gli oltre 9.000 presenti su BDoctors. <br><br>

              Per questo su BDoctors, solo i pazienti che hanno prenotato attraverso il sito e svolto la prestazione possono rilasciare un feedback sul medico: una garanzia dell'affidabilità delle 113.553 recensioni che leggi.
            </p>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="container-img mt-5">
              <img src="https://blog.hubspot.com/hubfs/GettyImages-974683580.jpg" alt="">
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- //Dicono di noi -->

    <!-- Sei un medico -->
    <div class="container-fluid container-med">
      <div class="container">
        <div class="row justify-content-center align-items-center flex-wrap-reverse">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center">
            <div class="container-img mt-5">
              <img src="https://i.pinimg.com/564x/b6/fb/ae/b6fbae77fd650ee77826cf5887856dce.jpg" alt="">
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <h5 class="title-section">
              Sei un medico? Iscriviti ora!
            </h5>
            <p>
              <strong>Iscriviti e raggiungi nuovi pazienti</strong>  <br><br>
              Più di 2 milioni di pazienti cercano ogni mese il loro Medico su BDoctors, il primo sito in Italia per visitatori e numero di prenotazioni. <br><br>
              <strong>Con BDoctors:</strong> <br><br>
              <ul>
                <li>Ricevi prenotazioni da nuovi pazienti</li>
                <li>Migliori la tua visibilità e la tua reputazione online</li>
                <li>Organizzi al meglio il tuo lavoro con una suite completa di strumenti dedicati al Medico</li>
                <li>Puoi usare la nostra App multipiattaforma dedicata ai Medici</li>
                <li>Hai il nostro staff sempre disponibile ad aiutarti</li>
              </ul>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- //Sei un medico -->




  </div>
</template>

<script>
import CardsDoctors from "./CardsDoctors.vue"
import Loader from "./Loader.vue"

export default {
  name: "Home",

  components:{
    CardsDoctors,
    Loader
  },

  data(){
      return {
        apiUrl: 'http://127.0.0.1:8000/api/specializations',
        apiPremium: 'http://127.0.0.1:8000/api/premium',
        specs: [],
        doctors: [],
        specToSearch: '',
        slug: this.output,
        pagination: {},
        isLoading: false,
      }
  },
  methods: {
      getSpecs(){
          axios.get(this.apiUrl)
            .then(res =>{
                this.specs = res.data.specialization
                console.log(this.specs);
            })
            .catch(err =>{
                console.error(err);
            })
      },

      getDoctorsPremium(page = 1){
        this.isLoading = true;
        axios.get(this.apiPremium + '?page=' + page)
          .then(res =>{
            this.doctors = res.data.data;
            this.pagination = {
              current: res.data.current_page,
              last: res.data.last_page,
            };
            this.isLoading = false;
          })
      },

      nextpage(page) {
      if (page <= this.totalPages) {
        if (this.orderBy != "default")
          ++this.currentPage;
        }
      },
      prevpage(page) {
        console.log("pagina corrente:", page);
        if (page > 0) {
          this.currentPage--;
          if (this.orderBy != "default")
            this.searchnew(--this.currentPage, this.orderBy);
          else {
            this.searchbycount(--this.currentPage, this.orderByCount);
          }
        }
      },
      scrollTop(){
            window.scrollTo(0, 0);
      }
  },
  computed:{
    output: function () {
        this.slug = this.specToSearch
          .toLowerCase()
          .replace(/\s+/g, "-")
          .replace(/&/g, `-and-`)
          .replace(/--/g, `-`);

        return this.slug;
    },
    checkedValue: function () {
        if(this.specs.some(e => e.name == this.specToSearch)){
            return true;
        }
        return false;
    }
 },
  mounted(){
      this.getSpecs();
      this.getDoctorsPremium();
      this.scrollTop();
  }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_vars.scss';
.home{
  padding: unset;

    // card
    .container-grid{
    display: grid;
    margin: 0.2rem;
    gap: 0.7rem;
    grid-template-columns:  repeat(4, 1fr);
    }

  // Carousel

  .ab-carousel{
    height: 450px;

    .ab-inner{
      height: 450px;
      cursor: pointer;
      // &:hover{
      //   img{
      //     filter: none;
      //       transition: all 0.3s;
      //   }
      //   .carousel-text{
      //     background-color: rgba(255, 255, 255, 0.7);
      //     color: lighten($primary-color, 10%);
      //     transition: all .3s;
      //   }
      // }
      img{
        height: 500px;
        width: auto;
        object-fit: cover;
        filter: grayscale(40%);
        transition: all 0.3s;
        object-position: top;
      }
      .carousel-text{
        color: $primary-color;
        transition: all .3s;
        background-color: rgba(255, 255, 255, 0.85);
        margin-bottom: 40px;
        border-radius: 10px;
      }
      .carousel-control-prev, .carousel-control-next{
        &:hover{
          span{
            filter: opacity(1);
            color: white;
            filter: drop-shadow(0 10px 10px gray);
            transition: all .3s;
          }

        }

      }

    }
  }
  //Search
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

          &:focus{
            border: none;
            box-shadow: 0px 0px 20px -5px $primary-color;
          }

          &:focus button{
            box-shadow: 0px 0px 20px -5px $primary-color;
          }
        }
        h4{
          color: $primary-color;
        }
        button{
          border: 1px solid $fourth-color;
          color: white;
          font-weight: 600;
          border-radius: 0 10px 10px 0;
          background-color: $fourth-color;

          &:hover{
            background-color: $third-color;
            border-color: $third-color;
          }
          &:disabled{
            opacity: 1;
          }
        }
      }
    }
  }

  //premium
  .title-premium{
    color: $primary-color;
    font-size: 25px;
    padding: 10px 0;
  }
  .navigation{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    button{
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: white;
      border: 1px solid $primary-color;
      margin: 20px 0;
      border-radius: 0px 10px 10px 0;
      color: $fourth-color;
      &:disabled{
        color: lightgrey;
      }
      i{
        padding: 15px;
        font-size: 20px;
      }
      &.prev{
        border-radius: 15px 0 0 15px;
      }
      &.next{
        border-radius: 0 15px 15px 0;
      }
      &:hover{
        color: $third-color;
      }
    }
  }

   //info
  .bg-container{
    // background: linear-gradient(to bottom, #f3f3f3 10%, white 100%);
    .container-info{
      .img-info{
        text-align: center;

        img{
          height: 200px;
          width: 200px;
          border-radius: 50%;
          box-shadow: 0px 10px 5px lightgray;
        }
        .text-info{
          margin-top: 40px;
          .title-info{
            color: $primary-color;
            font-size: 16px;
            font-weight: 600;
          }
          p{
            color: $fourth-color;
            font-size: 13px;
            margin-top: 10px;
          }
        }
      }
    }
  }

  //About us
  .container-fluid-us{

    .container-us{
      margin-bottom: 20px;
      h4{
        font-size: 25px;
        color: $primary-color;
        padding: 10px 0 20px 0;
      }
      p{
        font-size: 13px;
      }
      .container-img{
        height: 100%;
        width: 100%;
        img{
          height: 100%;
          width: 100%;
        }
      }
    }
  }

  //Sei un medico?
  .container-med{
    padding: 50px 0;
    .container{
      .row{
        .container-img{
          height: 330px;
          width: 330px;
          border-radius: 40px;
          border: 1px solid rgb(214, 229, 243);
          box-shadow: 10px 10px 5px lightgrey;

          img{
            border-radius: 40px;
            height: 100%;
            width: 100%;
          }
        }
        h4{
          color: $primary-color;
          font-size: 25px;
          padding: 10px 0;
        }
        p{
          font-size: 13px;
        }
        a{
          background-color: $primary-color;
          border-color: $primary-color;
          border-radius: 10px;
          padding: 5px 30px;
          &:hover{
            background-color: darken($primary-color,10%);
            border-color: darken($primary-color,10%);
            color: white;

          }
        }
      }

    }
  }
  .title-section{
    font-size: 30px;
    font-weight: 600;
    color: $primary-color;
    padding: 12px 0;
  }

  @media all and (max-width: 653px) {
    .title-section{
      text-align: center;
    }
  }
}
</style>
