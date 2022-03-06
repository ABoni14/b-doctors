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
        specialization: Array,
        error: String
    },
    components: {
        CardsDoctors,
    },
    data() {
        return {
            // doctors: [],
            // specialization: "",
        };
    },
};
</script>

<style lang="scss" scoped></style>
