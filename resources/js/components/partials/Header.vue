<template>
  <header class="container-fluid">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="left-nav">
          <router-link :to="{name: 'home'}" class="router">BDoctors</router-link>
        </div>
        <div class="right-nav">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
header{
  background-color: #066dbb;
  height: 80px;
  display: flex;
  justify-content: center;
  align-items: center;
  nav{
    background-color: #066dbb !important;
    padding:0 !important;
    display: flex;
    justify-content: space-between;
    align-items: center !important;
    .left-nav{
      .router{
        color: white !important;
        &:hover{
          text-decoration: none;
        }
      }
    }
    ul{
      align-items: center;
      .advanced-search{
        margin-right: 15px;
      }
      a{
        color: white !important;
        text-decoration: none;
    }
    }
    
  }
}
</style>