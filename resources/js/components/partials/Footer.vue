<template>
  <footer>
    <div class="container">
      <div class="top-footer">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-3 logo-footer">
            <a href="#">BDoctors</a>
            </div>
          <div class="col-6">
            <p>
              Doctolib Srl, - Società con socio unico, soggetta a direzione e coordinamento di Doctolib SAS - Sede Legale: Milano, Corso Giacomo Matteotti n. 1 - Capitale Sociale: euro 3.010.000,00 i.v.
              Codice Fiscale e Registro Imprese di Milano Monza Brianza Lodi n. 11537360965 - REA: MI - 2609715 - doctolib.it – PEC doctolibsrl@legalmail.it
            </p>
          </div>
          <div class="col-3">
            <ul>
              <li>Logo</li>
              <li>Logo</li>
              <li>Logo</li>
              <li>Logo</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="bottom-footer">
        <div class="row justify-content-center">
          <div class="col-3 link-footer-bottom"> <a href="#">Chi siamo</a> </div>
          <div class="col-3 link-footer-bottom"> <a href="#">Condizioni d'uso</a> </div>
          <div class="col-3 link-footer-bottom"> <a href="#">Privacy</a> </div>
 
        </div>
      </div>
      
    </div>

  </footer>
</template>

<script>
export default {
  name: "Footer"
}
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_vars.scss';

footer{
  background-color: $primary-color;
  padding: 40px 0;
  color:white;
  
  .top-footer{
    padding-bottom: 60px;
    
    .logo-footer{
      padding: 0;
      font-size: 40px;
      text-align: center;
      // border-right: 1px solid white;

      a{
        color: white;
        cursor: pointer;
     
        &:hover{
          text-decoration: none;
        }
      }
    }
    p{
      margin-bottom: 0;
      // padding-left: 20px;
      // border-left: 1px solid white;
      font-size: 12px;
    }
    ul{
      li{
        display: inline-block;
        text-decoration: none;
        list-style: none;
        cursor: pointer;
        padding: 0 5px;
      }
    }
  }

  .bottom-footer{
    .link-footer-bottom{
      text-align: center;
      a{
        color: white;
        &:hover{
          text-decoration: none;
          color: darken($primary-color, 20%)
        }
      }
    }
  }

}


</style>