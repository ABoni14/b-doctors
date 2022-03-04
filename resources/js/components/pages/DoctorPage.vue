<template>
  <div>
    {{JSON.parse(DoctorPage)}}
  </div>
</template>

<script>
export default {
  name: 'DoctorPage',

  props: ["DoctorPage"],
  setup(props){
    console.log(JSON.parse(props.DoctorPage));
  },

  // data(){
  //   return{
  //     doctors: this.$route.params
  //   }
  // },

  mounted(){
    console.log();
  }
}
</script>

<style lang="scss" scoped>

</style>