<template>
    <div class="container d-flex my-5">
        <!-- <div class="doctor-page macro-contain">
            <div class="row text-white">
                <div class="col-3">
                    <div v-if="doctor_profile.photo === null" class="image">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOQAAADdCAMAAACc/C7aAAAAaVBMVEXDw8MAAADGxsaXl5fJycnMzMxSUlKRkZF1dXV5eXnCwsIFBQWlpaV+fn66urqurq5dXV1sbGxMTEyKiopXV1czMzOcnJwaGhqoqKiEhIQlJSUrKysODg5mZmZHR0ezs7M7OzsVFRU5OTmFwHepAAAC+klEQVR4nO3bi1KjMBSAYXIarIbea2uttVXf/yE36Q0qobrITHP0/2Z2Zt2xDP+GQEDMMgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANQ56dCtY+JcZge9zgzsrXvipGc61EtzLO29KbpKLMx9mkPpI83H410XFiblyGFufy7Ph0lHPnSya/aByFuqRv7sSqchUvwV83k4EHFtt6QhcrwOl4GXZdv9VBApq3CdK/w1c9nykNUQ+XK6pG/abin5SFmWy5Z+u6FMP7K6unttt6cKIqflSE4a9tQd/zRtKflI6ZeRw6Y9deFS2ryl5COzUXkzMWoIcZm45bixUkGkfd6PormyyBMZPxkzaVouKIjM7PAwjtPm/XRP4Rse8/hgaoh0djzdbl9XeePJxc7CUBdmHi/REOkPx3Bb2DTlnOwP6L34vNQReZ3szqffRXRa/oJIcetzpJnksS2pj3T5pPrIqmfr6wL9kbZvynWf/8uuPi21Rzrxa4WijCzMW/0j6iKdV/lSZPH5Ges0V3+4flqi+uV77Ql07QmCtkg7GlcumM4uI0/ZC+UjGe67FpVl+qhWGGw/f0pRpIS99aeWjTtV2rdopBleTktNkZkMwvmzMHf20BCaY42FWV3MXFWR2eZY8ezvpY/N8aF8UhuZz84jtV+Iu/d4YfiGu+oHFUX6e43i1LDODs1FfCT9P8+lXN7piZRxNWOS23nTOB7syvsRPZHZ+qKhv2uckMfBLqelmsjLew1/anlpOlbLwT5vSUeks/2rQVG9U5eSyLC0+f+3JE53XToiRT6+OjhjPjRFunz6dVHM9DAtVURG7zW+ZbAfSw2R0mpCHvi1vFMRabctC/1/zdaKisjTTwnaRIYfhCmIdHbQunF/Rl5J8pEizfca37Pxkzr5yNnXHdfNJPGRHNrRvP9D81HqkbnNO5D2W5K//X1XFyK7kuyby3/iHXTp8rcJVmk2/onfCwEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALi1f4DsKck70eEzAAAAAElFTkSuQmCC"
                            alt=""
                        />
                    </div>
                    <div v-else class="image">
                        <img :src="doctor_profile.photo" alt="..." />
                    </div>
                </div>
                <div class="col-4 d-flex align-items-center pl-4">
                    <h3 class="doctor-name">
                        {{ doctor_profile.first_name }}
                        {{ doctor_profile.last_name }}
                    </h3>
                </div>
                <div class="col-4 d-flex flex-column justify-content-center">
                    <h4>
                        <i class="fas fa-map-marker-alt mr-2"></i
                        >{{ doctor_profile.address }}
                    </h4>
                    <h4>
                        <i class="fas fa-envelope mr-2"></i
                        >{{ doctor_profile.email }}
                    </h4>
                    <h4>
                        <i class="fas fa-phone mr-2"></i
                        >{{ doctor_profile.phone }}
                    </h4>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="macro-contain">
                <div class="title-area">
                    <h4>CV</h4>
                </div>
                <div class="doctor-page components">
                    <div class="row mt-3">
                        <div class="col-12">{{ doctor_profile.cv }}</div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="macro-contain">
                                <div class="title-area">
                                    <h4>Specializzazioni</h4>
                                </div>
                                <div class="doctor-page components">
                                    <div
                                        v-for="(
                                            specialization, index
                                        ) in doctor_profile.specializations"
                                        :key="index"
                                    >
                                        <h5>
                                            <i class="fas fa-check mr-2"></i
                                            >{{ specialization.name }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="macro-contain">
                                <div class="title-area">
                                    <h4>Performance</h4>
                                </div>
                                <div class="doctor-page components">
                                    <div
                                        v-for="(
                                            performance, i
                                        ) in doctor_profile.performances"
                                        :key="i"
                                    >
                                        <h5>{{ performance.name }}</h5>
                                        <p>{{ performance.description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="macro-contain">
                        <div class="title-area">
                            <h4>Recensioni</h4>
                        </div>
                        <div class="col-12">
                            <div class="doctor-page review-contain components">
                                <div
                                    v-for="(
                                        review, key
                                    ) in doctor_profile.reviews"
                                    :key="key"
                                    class="review"
                                >
                                    <h5>
                                        Nome utente:
                                        {{ review.user_review_name }}
                                    </h5>
                                    <h5>Voto: {{ review.vote }}</h5>
                                    <p>{{ review.content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-5 justify-content-center">
            <div class="col-4">
                <a href="" class="doctor-page"> Invia messaggio </a>
            </div>
            <div class="col-4">
                <a href="" class="doctor-page"> Scrivi una recensione </a>
            </div>
        </div>

        <div class="row mb-5">
            <div id="messages" class="col-6">
                <Messages
                :doctor_id = "doctorId"
                />
            </div>
            <div id="reviews" class="col-6">
                <Reviews
                :doctor_id = "doctorId"
                />
            </div>
        </div> -->
        <div class="row">
            <div class="doctor col-lg-8 col-md-12">
                <div class="doc-top d-flex align-items-center">
                    <div v-if="doctor_profile.photo === null" class="mr-5">
                        <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOQAAADdCAMAAACc/C7aAAAAaVBMVEXDw8MAAADGxsaXl5fJycnMzMxSUlKRkZF1dXV5eXnCwsIFBQWlpaV+fn66urqurq5dXV1sbGxMTEyKiopXV1czMzOcnJwaGhqoqKiEhIQlJSUrKysODg5mZmZHR0ezs7M7OzsVFRU5OTmFwHepAAAC+klEQVR4nO3bi1KjMBSAYXIarIbea2uttVXf/yE36Q0qobrITHP0/2Z2Zt2xDP+GQEDMMgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANQ56dCtY+JcZge9zgzsrXvipGc61EtzLO29KbpKLMx9mkPpI83H410XFiblyGFufy7Ph0lHPnSya/aByFuqRv7sSqchUvwV83k4EHFtt6QhcrwOl4GXZdv9VBApq3CdK/w1c9nykNUQ+XK6pG/abin5SFmWy5Z+u6FMP7K6unttt6cKIqflSE4a9tQd/zRtKflI6ZeRw6Y9deFS2ryl5COzUXkzMWoIcZm45bixUkGkfd6PormyyBMZPxkzaVouKIjM7PAwjtPm/XRP4Rse8/hgaoh0djzdbl9XeePJxc7CUBdmHi/REOkPx3Bb2DTlnOwP6L34vNQReZ3szqffRXRa/oJIcetzpJnksS2pj3T5pPrIqmfr6wL9kbZvynWf/8uuPi21Rzrxa4WijCzMW/0j6iKdV/lSZPH5Ges0V3+4flqi+uV77Ql07QmCtkg7GlcumM4uI0/ZC+UjGe67FpVl+qhWGGw/f0pRpIS99aeWjTtV2rdopBleTktNkZkMwvmzMHf20BCaY42FWV3MXFWR2eZY8ezvpY/N8aF8UhuZz84jtV+Iu/d4YfiGu+oHFUX6e43i1LDODs1FfCT9P8+lXN7piZRxNWOS23nTOB7syvsRPZHZ+qKhv2uckMfBLqelmsjLew1/anlpOlbLwT5vSUeks/2rQVG9U5eSyLC0+f+3JE53XToiRT6+OjhjPjRFunz6dVHM9DAtVURG7zW+ZbAfSw2R0mpCHvi1vFMRabctC/1/zdaKisjTTwnaRIYfhCmIdHbQunF/Rl5J8pEizfca37Pxkzr5yNnXHdfNJPGRHNrRvP9D81HqkbnNO5D2W5K//X1XFyK7kuyby3/iHXTp8rcJVmk2/onfCwEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALi1f4DsKck70eEzAAAAAElFTkSuQmCC"
                        alt=""
                        />
                    </div>
                    <div v-else class="mr-5">
                        <img :src="doctor_profile.photo" alt="..." />
                    </div>
                    <div>
                        <h1>
                            {{ doctor_profile.first_name }}
                            {{ doctor_profile.last_name }}
                        </h1>
                        <div
                            v-for="(specialization, index) in doctor_profile.specializations"
                            :key="index"
                            >
                            <h5>
                                <i class="fas fa-user-md mr-3"></i>
                                {{ specialization.name }}
                            </h5>
                        </div>
                        <span class="d-block">
                            <i class="fas fa-map mr-3"></i>
                            {{ doctor_profile.address }}
                        </span>
                        <span>
                            <i class="fas fa-phone mr-3"></i>
                            {{ doctor_profile.phone }}
                        </span>
                    </div>
                </div>
                
                <div class="doc-bottom d-flex">
                    
                    <div class="vote">
                        <div
                            v-for="( review, key ) in doctor_profile.reviews"
                            :key="key"
                            class="review"
                            >
                            <h5>
                                Voto: {{ review.vote }}
                            </h5>
                            
                        </div>
                    </div>

                    <div class="reviews">
                       <h5 class="text-center mb-3">Recensioni: </h5>
                        <div
                            v-for="( review, key ) in doctor_profile.reviews"
                            :key="key"
                            class="review"
                            >
                            <h5>
                                Nome utente:
                                {{ review.user_review_name }}
                            </h5>
                            <p>{{ review.content }}</p>
                        </div>
                    </div>
                </div>
                <div class="doctor-details my-5">
                    <h5>
                        Riguardo dr. {{ doctor_profile.first_name }} {{ doctor_profile.last_name }}
                    </h5>
                    <p>{{ doctor_profile.cv }}</p>
                </div>
                        
            </div>
            <div class="forms d-flex flex-column col-lg-4 col-md-12">
                <div class="form-top">
                    <div id="messages" class="mb-4">
                        <Messages
                        :doctor_id = "doctorId"
                        />
                    </div>
                
                </div>
                <div class="form-bottom">
                    <div id="reviews" class="">
                        <Reviews
                        :doctor_id = "doctorId"
                        />
                    </div>
                </div>

            </div>

        </div>
       
    </div>
</template>

<script>
import Messages from "./forms/Messages.vue";
import Reviews from "./forms/Reviews.vue";

export default {
    name: "DoctorPage",
    components: {
        Messages,
        Reviews,
    },

    data() {
        return {
            apiUrl: "http://127.0.0.1:8000/api/profile-detail/",
            doctor_slug: this.$route.params.slug,
            doctor_profile: {},
            doctorId: null
        };
    },
    methods: {
        getDoctorBySlug() {
            axios.get(this.apiUrl + this.doctor_slug).then((res) => {
                this.doctor_profile = res.data;
                this.doctorId = res.data.id;
                console.log(this.doctor_profile);
            });
        },
    },
    mounted() {
        this.getDoctorBySlug();
    },
};
</script>

<style lang="scss" scoped>
// .doctor-page {
//     margin-top: 20px;
//     margin-bottom: 20px;
//     // border: 1px solid grey;
//     border-radius: 15px;
//     padding: 20px;
//     .image {
//         border-radius: 50%;
//         border: 1px solid grey;
//         padding: 5px;
//         background-color: white;
//         img {
//             width: 100%;
//             border-radius: 50%;
//         }
//     }
//     &.review-contain {
//         height: 327px;
//         overflow: auto;
//         margin-left: -15px;
//         padding-left: -15px !important;
//     }
// }
// .title-area {
//     margin-left: 20px;
//     color: white;
// }

// ::-webkit-scrollbar {
//     display: block;
// }

// .top-container {
//     background-image: linear-gradient(white, #2a77d1);
// }

// .main-container {
//     background-color: white;
//     padding: 20px;
//     border-radius: 15px;
// }

// .components {
//     background-color: white;
// }

// .macro-contain {
//     background-color: #2a77d1;
//     padding: 15px;
//     border-radius: 15px;
//     margin-bottom: 20px;
// }
.doctor{
    min-height: 300px;
    padding: 20px 30px;
    color: rgb(0, 35, 75);
    img{
        border-radius: 50%;
    }
    .doc-top{
        padding-bottom: 30px;
        border-bottom: 1px solid lightgray;
    }
    .doc-bottom{
        padding: 30px 0;
        border-bottom: 1px solid lightgray;
        .vote{
            width: 300px;
            padding-right: 35px;
            border-right: 1px solid lightgray;
        }
        .reviews{
            // width: 70%;
            height: 400px;
            overflow: auto;
            // border-left: 2px solid lightgray;
            margin-left: 40px;
            &::-webkit-scrollbar{
                display: block;
            }
        }
        
    }
    .doctor-details{
        border-bottom: 4px solid rgb(240, 240, 240);
        padding-bottom: 50px;
    }
}
.forms{

    min-height: 300px;
    padding: 20px 30px;
    background-color: rgb(247, 248, 249);
    border: 1px solid lightgrey;

    .form-top{
        border-bottom: 2px solid lightgray;
        margin-bottom: 30px;
    }
}
</style>