<template>
    <div class="container my-4">
        <h2 v-if="doctors.length > 0" class="text-center my-5">
            I risultati della tua ricerca
        </h2>
        <h2 v-else-if="error" class="text-center my-3">
            {{error}}
        </h2>
        <h2 v-else class="text-center">
            Cerca qualcosa!
        </h2>

        <div  class="row">
            <!-- <Sidebar 
            :performances="performances"
            @filteredDoctorByPerformance="filteredDoctorByPerformance"
            /> -->
            <CardsDoctors
            v-for="(doctor, index) in doctors"
            :key="index"
            :doctorInfo="doctor"
            />
        </div>
    </div>
</template>

<script>
import CardsDoctors from "./CardsDoctors.vue";
import Sidebar from "../partials/Sidebar.vue"

export default {
    name: "SpecializationDoctors",
    props: {
        doctors: Array,
        specialization: Array,
        error: String,
        // performances: Array
    },
    components: {
        CardsDoctors,
        Sidebar
    },

    data(){
        return{
            apiUrl: 'http://127.0.0.1:8000/api/doctors',
            performances: []
        }
    },

    methods:{
        filteredDoctorByPerformance(slug_performance){
            axios.get(this.apiUrl + '/performance/' + slug_performance)
                .then(res =>{
                    console.log(this.slug_performance);
                    this.performances = res.data.performance;
                    console.log(this.performances);
                })
        }
    },

    mounted(){
        this.filteredDoctorByPerformance(this.performances);
        console.log();
        // console.log(this.performances);
        // console.log(this.performances);
    }
};
</script>

<style lang="scss" scoped>
</style>
