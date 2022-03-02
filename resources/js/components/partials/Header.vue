<template>
  <header class="container-fluid">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="left-nav">
          <router-link :to="{name: 'home'}" class="router">BDoctors</router-link>
        </div>
        <div class="right-nav">
          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <router-link :to="{name: 'AdvancedSearch'}" class="advanced-search">Ricerca avanzata</router-link>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/register">Registrati</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/login">Login</a>
              </li>  
            </ul>
          </div> -->
          <button class="navbar-toggler third-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent22"
            aria-controls="navbarSupportedContent22" aria-expanded="false" aria-label="Toggle navigation">
            <div class="animated-icon3"><span></span><span></span><span></span></div>
          </button>

          <!-- Collapsible content -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent22">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <router-link :to="{name: 'AdvancedSearch'}" class="advanced-search nav-link">Ricerca avanzata<span class="sr-only">(current)</span></router-link>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/register">Registrati</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/login">Login</a>
              </li>
            </ul>
            <!-- Links -->

          </div>
        </div>
        
      </nav> 



      

    </div>
  </header>
</template>

<script>
export default {
  name: "Header"
}
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_vars.scss';

header{
  background-color: lighten($primary-color, 15%);
  display: flex;
  justify-content: center;
  align-items: center;
  nav{
      background-color: lighten($primary-color, 15%) !important;
    padding:0 !important;
    display: flex;
    justify-content: space-between;
    align-items: center !important;
    .left-nav{
      .router{
        color: white !important;
        font-size: 40px;
        &:hover{
          text-decoration: none;
        }
      }
    }
    .right-nav{
      
      ul{
        align-items: center;
        .advanced-search{
          margin: 0 15px;
        }
        a{
          color: white !important;
          text-decoration: none;
          padding: 5px 10px;
          margin: 0 15px;
          display: block;
          line-height: 80px;
          &:hover{
            color: $primary-color !important ;
            transition: all 0.3s;
            
          }
        }
      }
    }

    .animated-icon3 {
      width: 30px;
      height: 20px;
      position: relative;
      margin: 0px;
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
      -webkit-transition: .5s ease-in-out;
      -moz-transition: .5s ease-in-out;
      -o-transition: .5s ease-in-out;
      transition: .5s ease-in-out;
      cursor: pointer;
    }

      .animated-icon3 span {
        background-color: black;
        display: block;
        position: absolute;
        height: 3px;
        width: 100%;
        border-radius: 9px;
        opacity: 1;
        left: 0;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .25s ease-in-out;
        -moz-transition: .25s ease-in-out;
        -o-transition: .25s ease-in-out;
        transition: .25s ease-in-out;
      }

      .animated-icon3 span:nth-child(1) {
        top: 0px;
        -webkit-transform-origin: left center;
        -moz-transform-origin: left center;
        -o-transform-origin: left center;
        transform-origin: left center;
      }

      .animated-icon3 span:nth-child(2) {
        top: 10px;
        -webkit-transform-origin: left center;
        -moz-transform-origin: left center;
        -o-transform-origin: left center;
        transform-origin: left center;
      }

      .animated-icon3 span:nth-child(3) {
        top: 20px;
        -webkit-transform-origin: left center;
        -moz-transform-origin: left center;
        -o-transform-origin: left center;
        transform-origin: left center;
      }

      .animated-icon3.open span:nth-child(1) {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        top: 0px;
        left: 8px;
      }

      .animated-icon3.open span:nth-child(2) {
        width: 0%;
        opacity: 0;
      }

      .animated-icon3.open span:nth-child(3) {
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
        top: 21px;
        left: 8px;
      }
    
    
  }
}
</style>