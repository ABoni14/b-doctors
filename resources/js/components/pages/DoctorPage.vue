<template>
  <div class="container doctor-page">
    <div class="row">
      <div class="col-3">
        <div v-if="doctor_profile.photo === null" class="image">
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOQAAADdCAMAAACc/C7aAAAAaVBMVEXDw8MAAADGxsaXl5fJycnMzMxSUlKRkZF1dXV5eXnCwsIFBQWlpaV+fn66urqurq5dXV1sbGxMTEyKiopXV1czMzOcnJwaGhqoqKiEhIQlJSUrKysODg5mZmZHR0ezs7M7OzsVFRU5OTmFwHepAAAC+klEQVR4nO3bi1KjMBSAYXIarIbea2uttVXf/yE36Q0qobrITHP0/2Z2Zt2xDP+GQEDMMgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANQ56dCtY+JcZge9zgzsrXvipGc61EtzLO29KbpKLMx9mkPpI83H410XFiblyGFufy7Ph0lHPnSya/aByFuqRv7sSqchUvwV83k4EHFtt6QhcrwOl4GXZdv9VBApq3CdK/w1c9nykNUQ+XK6pG/abin5SFmWy5Z+u6FMP7K6unttt6cKIqflSE4a9tQd/zRtKflI6ZeRw6Y9deFS2ryl5COzUXkzMWoIcZm45bixUkGkfd6PormyyBMZPxkzaVouKIjM7PAwjtPm/XRP4Rse8/hgaoh0djzdbl9XeePJxc7CUBdmHi/REOkPx3Bb2DTlnOwP6L34vNQReZ3szqffRXRa/oJIcetzpJnksS2pj3T5pPrIqmfr6wL9kbZvynWf/8uuPi21Rzrxa4WijCzMW/0j6iKdV/lSZPH5Ges0V3+4flqi+uV77Ql07QmCtkg7GlcumM4uI0/ZC+UjGe67FpVl+qhWGGw/f0pRpIS99aeWjTtV2rdopBleTktNkZkMwvmzMHf20BCaY42FWV3MXFWR2eZY8ezvpY/N8aF8UhuZz84jtV+Iu/d4YfiGu+oHFUX6e43i1LDODs1FfCT9P8+lXN7piZRxNWOS23nTOB7syvsRPZHZ+qKhv2uckMfBLqelmsjLew1/anlpOlbLwT5vSUeks/2rQVG9U5eSyLC0+f+3JE53XToiRT6+OjhjPjRFunz6dVHM9DAtVURG7zW+ZbAfSw2R0mpCHvi1vFMRabctC/1/zdaKisjTTwnaRIYfhCmIdHbQunF/Rl5J8pEizfca37Pxkzr5yNnXHdfNJPGRHNrRvP9D81HqkbnNO5D2W5K//X1XFyK7kuyby3/iHXTp8rcJVmk2/onfCwEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALi1f4DsKck70eEzAAAAAElFTkSuQmCC" alt="">
        </div>
        <div v-else class="image">
          <img :src="doctor_profile.photo" alt="...">
        </div>
      </div>
      <div class="col-4">
        <h3>{{doctor_profile.first_name}} {{doctor_profile.last_name}}</h3>
      </div>
      <div class="col-3">
        <h4>{{doctor_profile.address}}</h4>
        <h4>{{doctor_profile.email}}</h4>
        <h4></h4>
      </div>
    </div>
    <div class="row">
      <!-- <div class="col-12">{{doctor_profile.cv}}</div> -->
    </div>
  </div>
</template>

<script>
export default {
  name: 'DoctorPage',

  data(){
    return{
        apiUrl: 'http://127.0.0.1:8000/api/profile-detail/',
        doctor_id: this.$route.params.slug,
        doctor_profile: {},
    }
  },
  methods:{
      getDoctorById(){
          axios.get(this.apiUrl + this.doctor_id)
            .then(res => {
                this.doctor_profile = res.data;
                console.log(this.doctor_profile);
            })
      }
  },
  mounted(){
      this.getDoctorById();
  }
}
</script>

<style lang="scss" scoped>
.doctor-page{
  margin-top: 20px;
  margin-bottom: 20px;
  border: 1px solid grey;
  border-radius: 15px;
  padding: 20px;
  .image{
    img{
      width: 100%;
    }
  }
}
</style>
