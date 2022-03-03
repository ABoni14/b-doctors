import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import Home from "./components/pages/Home.vue";
import AdvancedSearch from "./components/pages/AdvancedSearch.vue";
import SpecializationDoctors from "./components/pages/SpecializationDoctors.vue";

const router = new VueRouter({
  mode: "history",
  linkExactActiveClass: "active",
  routes:[
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/advanced-search",
      name: "AdvancedSearch",
      component: AdvancedSearch
    },
    {
      path: "/specialization-doctors/:slug",
      name: "SpecializationDoctors",
      component: SpecializationDoctors
    },
  ]
});

export default router;