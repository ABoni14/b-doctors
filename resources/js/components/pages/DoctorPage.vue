<template>
  <div>
      {{doctor_profile.first_name}}
  </div>
</template>

<script>
export default {
  name: 'DoctorPage',

  data(){
    return{
        apiUrl: 'http://127.0.0.1:8000/api/profile-detail/',
        doctor_id: this.$route.params.id,
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

</style>
