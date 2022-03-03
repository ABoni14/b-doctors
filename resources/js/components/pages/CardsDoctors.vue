<template>
  <div class="maincontainer">

      <div class="thecard">

        <div class="thefront d-flex flex-column align-items-center">
           <h3>Nome e cognome</h3>
           <img src="https://adriaticaindustriale.it/wp-content/uploads/2020/02/not-found.png" alt="" width="170px">
        </div>

        <div class="theback">
          <h2>Indirizzo</h2>
          <p>Your use of this site is subject to the terms and conditions governing this and all transactions.</p>
          <button>Vai al profilo</button>
        </div>

      </div>
  </div>

</template>

<script>

export default {
  name: 'CardsDoctors',
    props: {
    specializationSlug: String
  },
}
</script>

<style lang="scss" scoped>


/* THE MAINCONTAINER HOLDS EVERYTHING */
.maincontainer{
 
  width: 250px;
  height: 320px;
  background: none;

}

/* THE CARD HOLDS THE FRONT AND BACK FACES */
.thecard{
  width: 100%;
  height: 100%;
  border-radius: 10px;
  transform-style: preserve-3d;
  transition: all 0.8s ease;
}

/* THE PSUEDO CLASS CONTROLS THE FLIP ON MOUSEOVER AND MOUSEOUT */
.thecard:hover{
  transform: rotateY(180deg);
}

/* THE FRONT FACE OF THE CARD, WHICH SHOWS BY DEFAULT */
 .thefront{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  overflow: hidden;
  background: #ffc728;
  color: #000;
}

/* THE BACK FACE OF THE CARD, WHICH SHOWS ON MOUSEOVER */
.theback{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  overflow: hidden;
  background: #fafafa;
  color: #333;
  text-align: center;
  transform: rotateY(180deg);
}


/*This block (starts here) is merely styling for the flip card, and is NOT an essential part of the flip code */
.thefront h1, .theback h1{
  font-family: 'zilla slab', sans-serif;
  padding: 30px;
  font-weight: bold;
  font-size: 24px;
  text-align: center;
}

.thefront p, .theback p{
  font-family: 'zilla slab', sans-serif;
  padding: 30px;
  font-weight: normal;
  font-size: 12px;
  text-align: center;
}
</style>