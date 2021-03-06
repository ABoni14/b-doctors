<template>
    <div class="advanced-search">
        <div
            class="container d-flex flex-column justify-content-center text-center"
        >
            <div class="">
                <h1>Seleziona una specializzazione</h1>
                <select
                    class="select-spec"
                    name="specializations"
                    id="specializations"
                    @change="getDoctorsBySpec(), changeQueryUrl(specToSearch)"
                    v-model="specToSearch"
                >
                    <option value="">Seleziona la specializzazione</option>
                    <option
                        v-for="(singleSpecialization, index) in specialization"
                        :key="index"
                        :value="singleSpecialization.slug"
                        :name="singleSpecialization.name"
                    >
                        {{ singleSpecialization.name }}
                    </option>
                </select>
            </div>

            <div class="my-4 row">
                <div class="col-xs-12 col-md-6 ab-filter">
                    <h4>Filtra per media voti</h4>
                    <select
                        class="filter"
                        @change="averageVoteFilter"
                        v-model="filterStar"
                        :disabled="!specToSearch"
                    >
                        <option
                            v-for="(star, index) in stars"
                            :key="index"
                            :value="star[0]"
                        >
                            {{ star[1] }}
                        </option>
                    </select>
                </div>

                <div class="col-xs-12 col-md-6 ab-filter">
                    <h4>Filtra per recensioni</h4>
                    <select
                        class="filter"
                        v-model="filterReview"
                        @change="filterNumberReview"
                        :disabled="!specToSearch"
                    >
                        <option
                            v-for="(review, index) in reviews"
                            :key="index"
                            :value="review[0]"
                        >
                            {{ review[1] }}
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div>
            <div v-if="isLoading">
                <Loader />
            </div>

            <div v-else class="">
                <SpecializationDoctors
                    :doctors="filteredDoctors"
                    :error="error"
                    :title_spec="title_spec"
                />
            </div>
        </div>
        <div class="container-img mt-4 text-center">
            <img src="../../../../public/img/medical.jpg" alt="" />
        </div>
    </div>
</template>

<script>
import SpecializationDoctors from "./SpecializationDoctors.vue";
import Loader from "./Loader.vue";
export default {
    name: "AdvancedSearch",
    components: {
        SpecializationDoctors,
        Loader,
    },
    props: ["slug"],
    data() {
        return {
            baseApi: "http://127.0.0.1:8000/api/",
            specList: "http://127.0.0.1:8000/api/specializations",
            spec: "doctors/specialization/",
            doctors: [],
            specialization: [],
            title_spec: "",
            specToSearch: "",
            filterStar: 0,
            filterReview: 0,
            error: "",
            isLoading: false,
            filteredDoctors: [],
            stars: [
                [0, "Stelle valutazione"],
                [1, "Almeno una stella"],
                [2, "Almeno due stelle"],
                [3, "Almeno tre stelle"],
                [4, "Almeno quattro stelle"],
                [5, "Cinque stelle"],
            ],
            reviews: [
                [0, "Numero recensioni"],
                [1, "Almeno una recensione"],
                [2, "Almeno due recensioni"],
                [3, "Almeno tre recensioni"],
                [4, "Più di quattro recensioni"],
            ],
            reviewNumber: 0,
            vote_sum: 0,
            vote_avg: 0,
            vote_arr_length: 0,
        };
    },
    methods: {
        //get specializations list
        getSpecList() {
            this.error = "";
            axios
                .get(this.specList)
                .then((res) => {
                    this.specialization = res.data.specialization;
                })
                .catch((err) => {
                    console.error(err);
                });
        },
        // search through advanced-search page
        getDoctorsBySpec() {
            this.error = "";
            this.isLoading = true;
            axios
                .get(this.baseApi + this.spec + this.specToSearch)
                .then((res) => {
                    this.doctors = res.data.premium_users;
                    this.filteredDoctors = res.data.premium_users;
                    this.title_spec = res.data.specialization.name;
                    this.error = res.data.error;
                    this.isLoading = false;
                })
                .catch((err) => {
                    console.error(err);
                });
        },
        // search through search-bar from Home page (redirect)
        getDoctorsHome() {
            this.error = "";
            this.isLoading = true;
            axios
                .get(this.baseApi + this.spec + this.specToSearch)
                .then((res) => {
                    this.doctors = res.data.premium_users;
                    this.filteredDoctors = res.data.premium_users;
                    this.title_spec = res.data.specialization.name;
                    this.error = res.data.error;
                    this.isLoading = false;
                })
                .catch((err) => {
                    console.error(err);
                });
        },
        // filter doctors for avg reviews votes
        averageVoteFilter() {
            this.filteredDoctors = [];
            this.filterArr = this.doctors;
            this.filterArr.forEach((doctor) => {
                this.vote_sum = 0;
                this.vote_avg = 0;
                doctor.reviews.forEach((review) => {
                    this.vote_sum += review.vote;
                });
                this.vote_arr_length = doctor.reviews.length;
                this.vote_avg = this.vote_sum / this.vote_arr_length;
                if (this.vote_avg >= this.filterStar) {
                    this.filteredDoctors.push(doctor);
                }
            });
            return this.filteredDoctors;
        },
        //filter doctors for numbers of reviews posted by users (relevance)
        filterNumberReview() {
            this.reviewNumber = 0;
            this.filteredDoctors = [];
            this.filterArr = this.doctors;
            this.filterArr.forEach((doctor) => {
                this.reviewNumber = doctor.reviews.length;

                if (this.reviewNumber >= this.filterReview) {
                    this.filteredDoctors.push(doctor);
                }
            });
            return this.filteredDoctors;
        },
        changeQueryUrl(specToSearch) {
            this.$router.replace({ query: { specialization: specToSearch } });
        },
        removeQueryUrl() {
            this.$router.replace({ path: "/advanced-search" });
        },
    },
    mounted() {
        this.getSpecList();
        this.removeQueryUrl();
        // get slug from home-page for API getDoctorsHome call
        if (
            this.$route.params.slug != undefined &&
            this.$route.params.slug != null
        ) {
            this.specToSearch = this.$route.params.slug;
            this.getDoctorsHome();
            this.changeQueryUrl(this.specToSearch);
        } else {
            console.log("search was null or empty try searching something");
        }
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/guest/_vars.scss";

.advanced-search {
    padding-top: 80px;
    color: $primary-color;
    .select-spec {
        background-color: white;
        width: 80%;
        border-radius: 10px;
        padding: 20px 15px;
        border: 1px solid $fourth-color;
        color: $fourth-color;
        font-weight: 600;
        font-size: 20px;
        &:focus,
        &:focus-visible {
            outline: 2px solid $fourth-color !important;
        }
    }
    .filter {
        background-color: white;
        width: 60%;
        border-radius: 10px;
        padding: 12px;
        border: 1px solid $fourth-color;
        font-weight: 600;
        font-size: 15px;
        color: $fourth-color;
        &:focus,
        &:focus-visible {
            outline: 2px solid $fourth-color !important;
            color: $fourth-color;
        }
        &:disabled{
            background-color: lightgrey;
        }
    }
    .container-img {
        img {
            width: 80%;
        }
    }
}
</style>
