import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import Home from "./components/pages/Home.vue";
import AdvancedSearch from "./components/pages/AdvancedSearch.vue";
import DoctorPage from "./components/pages/DoctorPage.vue";
import Error404 from "./components/pages/Error404.vue";

const router = new VueRouter({
  mode: "history",
  linkExactActiveClass: "active",
  routes:[
    {
        path: "/home-page",
        name: "home",
        component: Home
    },
    {
        path: "/advanced-search/",
        name: "AdvancedSearch",
        component: AdvancedSearch,
        props: true,
    },
    {
        path: "/user/:slug/details",
        name: "DoctorPage",
        component: DoctorPage,
        props: true,
    },
    // redirect
    {
        path: "/",
        redirect: '/home-page'
    },
    // catch all errors with pages
    {
        path: "/:catchAll(.*)",
        name: "Error404",
        component: Error404,
    }

  ]
});

export default router;
