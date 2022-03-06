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
                        <div class="row justify-content-center">
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
                        <div class="row">
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
</template>

<script>
import SpecializationDoctors from "./SpecializationDoctors.vue";
export default {
    name: 'AdvancedSearch',
    components:{
        SpecializationDoctors,
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
            error: '',
            homeSpec: '',
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
        getDoctorsBySpec(){
            this.error = '';
            axios.get(this.baseApi + this.spec + this.specToSearch)
            .then(res => {
                this.doctors= res.data.specialization.users;
                this.error= res.data.error;
            })
            .catch(err =>{
                console.error(err);
            })
        },
        getDoctorsHome(){
            this.error = '';
            axios.get(this.baseApi + this.spec + this.homeSpec)
            .then(res => {
                this.doctors= res.data.specialization.users;
                this.error= res.data.error;
            })
            .catch(err =>{
                console.error(err);
            })
        },


    },
    mounted(){
        this.getSpecList();
        // console.log(this.$route.params.slug);
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
