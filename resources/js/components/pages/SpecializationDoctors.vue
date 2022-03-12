<template>
    <div class="container-fluid my-4">
        <h2 v-if="doctors.length > 0" class="text-center my-5">
            I risultati della tua ricerca per {{title_spec}}
        </h2>
        <h2 v-else-if="error" class="text-center my-3">
            {{error}}
        </h2>
        <h2 v-else class="text-center">
            Avvia una Ricerca!
        </h2>

        <div class="row custom-row justify-content-center">
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

export default {
    name: "SpecializationDoctors",
    props: {
        doctors: Array,
        title_spec: String,
        error: String,
    },
    components: {
        CardsDoctors
    },


};
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_vars.scss';

.custom-row{
    width: 80%;
    margin:0 auto;
}

</style>
