<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar">
      <router-link :to="{name: 'home'}" class="logo">
        <img src="../../../../public/img/logo.png" alt="logo" width="70px">
        BDoctors
      </router-link>
      <button class="navbar-toggler third-button px-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent22" aria-controls="navbarSupportedContent22" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon3"><span></span><span></span><span></span></div>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent22">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 px-5">
          <li class="nav-item ml-auto active">
             <router-link :to="{name: 'AdvancedSearch'}" class="advanced-search nav-link">
               <i class="fas fa-search"></i>
               Ricerca avanzata
               <span class="sr-only">(current)</span>
             </router-link>
           </li>
           <li class="nav-item ml-auto">
             <a class="nav-link" aria-current="page" href="/register">
                <i class="fas fa-user-plus"></i>
                Registrati
             </a>
           </li>
           <li class="nav-item ml-auto">
             <a class="nav-link" aria-current="page" href="/login">
                <i class="fas fa-sign-in-alt"></i>
                Login
             </a>
           </li>
        </ul>
      </div>
    </nav>
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
    background-color: rgb(255, 240, 75);
    color: rgb(0, 35, 75);
  nav{
    padding:0 !important;
    .logo{
      font-size: 40px;
      text-decoration: none;
      padding: 5px 25px;
      margin: 0 15px;
    }
    button{
      border-color: transparent !important; 
    }
    li a{
      text-decoration: none;
      color: rgb(0, 35, 75) !important;
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
.animated-icon3 span {
background: white;
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


</style>