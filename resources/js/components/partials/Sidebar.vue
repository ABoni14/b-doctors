<template>
  <div class="col-3 sidebar">
    <div class="performance-box">
      <h3>Performance</h3>
      <div class="performance">
        <span
        v-for="performance in performances"
        :key="`perf${performance.id}`"
        @click="$emit('filteredDoctorByPerformance', performance.slug)"
        >{{ performance.name }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Sidebar",
  props:{
    'performances': Array,
    // 'votes': Array
  },

  // computed(){
  //   console.log("prova api", this.performances);
  // }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_vars.scss';
.sidebar{
  background-color: $primary-color;
  border-radius: 10px;
}
</style>