<template>
    <div class="container my-4">
        <h2 class="text-center my-5">
            Ecco i dottori per {{ specialization.name }}
        </h2>

        <div class="row justify-content-center">
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

    },
    components: {
        CardsDoctors,
    },
    data() {
        return {
            doctors: [],
            specialization: "",
        };
    },
};
</script>

<style lang="scss" scoped></style>
