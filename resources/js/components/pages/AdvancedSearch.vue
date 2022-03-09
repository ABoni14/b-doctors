<template>

    <div class="advanced-search">
        <div class="container-fluid">
            <div class="container">
                <div
                    class="row flex-column justify-content-center align-items-center"
                >
                    <div class="container-img">
                        <img
                            src="https://img.freepik.com/free-vector/patients-doctors-meeting-waiting-clinic-hall-hospital-interior-illustration-with-reception-person-wheelchair-visiting-doctor-office-medical-examination-consultation_74855-8496.jpg?w=1060"
                            alt=""
                        />
                    </div>

                    <div class="container">

                        <div
                        class="row justify-content-center">
                            <select class="select-spec"
                                name="specializations"
                                id="specializations"
                                @change="getDoctorsBySpec()"
                                v-model="specToSearch">
                                <option value="">Seleziona la specializzazione</option>
                                <option
                                v-for="(singleSpecialization, index) in specialization"
                                :key="index"
                                :value="singleSpecialization.slug"
                                :name="singleSpecialization.name"
                                class="col-6">
                                {{singleSpecialization.name}}</option>
                            </select>
                        </div>

                        <div class="row justify-content-center">
                            <div class="mr-5">
                                <h4>Ordina per media voti</h4>
                                <select 
                                @change="calcAverage()"
                                v-model="filterStar"
                                name="" id="">
                                    <option 
                                    v-for="(star, index) in stars"
                                    :key="index"
                                    :value="star[0]">{{star[1]}}</option>

                                </select>
                            </div>

                            <div>
                                <h4>Ordina per numero recensioni</h4>
                                <select 
                                v-model="filterReview"
                                @change="filterNumberReview"
                                name="" id="">
                                    <option 
                                    v-for="(review, index) in reviews"
                                    :key="index"
                                    :value="review[0]">{{review[1]}}</option>
                                </select>
                            </div>  
                        </div>

                        <div>
                            <div v-if="isLoading">
                                <Loader />
                            </div>

                            <div v-else
                            class="row">
                                <SpecializationDoctors
                                :doctors="doctors"
                                :specialization="specialization"
                                :error="error"
                                />
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SpecializationDoctors from "./SpecializationDoctors.vue";
import Loader from "./Loader.vue";
export default {
    name: 'AdvancedSearch',
    components:{
        SpecializationDoctors,
        Loader,
    },
    props: ['slug'],
    data(){
        return {
            baseApi: "http://127.0.0.1:8000/api/",
            specList: 'http://127.0.0.1:8000/api/specializations',
            spec: 'doctors/specialization/',
            doctors: [],
            specialization: [],
            specToSearch: '',
            filterStar: 0,
            filterReview: 0,
            error: '',
            homeSpec: '',
            isLoading: false,
            doctorArray: [],
            doctorArrayDuplicate: [],
            stars: [
                [0, "Qualsiasi valutazione"],
                [1, "Almeno una stella"],
                [2, "Almeno due stelle"],
                [3, "Almeno tre stelle"],
                [4, "Almeno quattro stelle"],
                [5, "Cinque stelle"],
            ],
            reviews: [
                [0, "Qualsiasi numero di recensioni"],
                [1, "Almeno due recensione"],
                [2, "Almeno quattro stelle"],
            ],
            sum: 0,
            avg: 0,
            length: 0,
        }
    },
    methods:{
        getSpecList(){
            this.error = '';

            axios.get(this.specList)
            .then(res => {
                this.specialization = res.data.specialization;
            })
            .catch(err =>{
                console.error(err);
            })
        },
        // search through advanced search page
        getDoctorsBySpec(){
            this.error = '';
            this.isLoading = true;
            axios.get(this.baseApi + this.spec + this.specToSearch)
            .then(res => {
                this.doctors= res.data.premium_users;
                this.doctorArrayDuplicate= res.data.premium_users;
                this.error= res.data.error;
                this.isLoading = false;
            })
            .catch(err =>{
                console.error(err);

            })
        },
        // search through search bar on Home page
        getDoctorsHome(){

            this.error = '';
            axios.get(this.baseApi + this.spec + this.homeSpec)
            .then(res => {
                this.doctors= res.data.premium_users;
                this.error= res.data.error;
            })
            .catch(err =>{
                console.error(err);
            })
        },

        calcAverage() {
            this.doctorArray = [];
            this.doctorArrayDuplicate.forEach(doctor => {
                this.sum = 0;
                this.avg = 0;
                doctor.reviews.forEach(review => {
                    this.sum += review.vote;
                });
                this.length = doctor.reviews.length;
                this.avg = this.sum / this.length;
                if(this.avg >= this.filterStar){
                    this.doctorArray.push(doctor);
                }
            });
            this.doctors = this.doctorArray;
        },

        filterNumberReview(){

        }
    },

    mounted(){

        this.getSpecList();
        if (this.$route.params.slug != undefined && this.$route.params.slug != null) {
            this.homeSpec = this.$route.params.slug;
            this.getDoctorsHome();
        }else{
            console.log('search was null or empty try searching something');
        }
    },


};
</script>

<style lang="scss" scoped>
.advanced-search {
    padding-bottom: 150px;
    .container {
        .container-img {
            height: 350px;
            width: 600px;
            img {
                height: 100%;
                width: 100%;
            }
        }
        #specializations{
            width: 80%;
            border-radius: 10px;
            padding: 5px 15px;
            border: 1px solid lightskyblue;
            &:focus, &:focus-visible{
                border: 2px solid lightskyblue !important;
                outline: 2px solid lightskyblue !important;
            }
        }
    }
}
</style>
