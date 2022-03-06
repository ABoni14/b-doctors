import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import Home from "./components/pages/Home.vue";
import AdvancedSearch from "./components/pages/AdvancedSearch.vue";
import SpecializationDoctors from "./components/pages/SpecializationDoctors.vue";
import DoctorPage from "./components/pages/DoctorPage.vue";
import Error404 from "./components/pages/Error404.vue";

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
        path: "/advanced-search/:slug",
        name : "SpecializationDoctors",
        component: SpecializationDoctors,
        props: true,
    },
    {
        path: "/user/:slug/details",
        name: "DoctorPage",
        component: DoctorPage,
        props: true,
    },
    {
        path: "/:catchAll(.*)",
        name: "Error404",
        component: Error404,
    }

  ]
});

export default router;
