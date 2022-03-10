<template>
    <div class="container my-4">
        <h2 v-if="doctors.length > 0" class="text-center my-5">
            I risultati della tua ricerca per {{title_spec}}
        </h2>
        <h2 v-else-if="error" class="text-center my-3">
            {{error}}
        </h2>
        <h2 v-else class="text-center">
            Avvia una Ricerca!
        </h2>

        <div class="container-grid">
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

.container-grid{
    display: grid;
    margin: 0.2rem;
    gap: 0.7rem;
    grid-template-columns:  repeat(4, 1fr);
}

</style>
