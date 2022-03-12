<template>
    <div class="container d-flex my-5">
        <div class="row">
            <div class="doctor col-lg-8 col-md-12">
                <div class="doc-top d-flex align-items-center">
                    <div v-if="doctor_profile.photo === null || doctor_profile.photo === undefined" class="picture">
                        <img
                            class="img-fluid"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Missing_avatar.svg/240px-Missing_avatar.svg.png"
                        />
                    </div>
                    <div
                        v-else-if="
                            doctor_profile.photo.substring(0, 4) != 'http' &&
                            doctor_profile.photo != null"
                        class="picture"
                    >
                        <img
                            class="img-fluid"
                            :src="`http://127.0.0.1:8000/storage/${doctor_profile.photo}`"
                        />
                    </div>

                    <div
                        v-else-if="
                            doctor_profile.photo.substring(0, 4) == 'http' &&
                            doctor_profile.photo != null"
                        class="picture"
                    >
                        <img class="img-fluid" :src="doctor_profile.photo" />
                    </div>

                    <div>
                        <h1>
                            {{ doctor_profile.first_name }}
                            {{ doctor_profile.last_name }}
                        </h1>
                        <div
                            v-for="(
                                specialization, index
                            ) in doctor_profile.specializations"
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

                <div class="doc-bottom row">
                    <div class="vote col-12 col-md-4">
                        <div class="text-center">
                            <h5 class="mb-3">Media voti</h5>
                            <h2>{{ calcAverage() }}</h2>
                            <h6>
                                <i
                                    v-for="(int, index) in 5"
                                    :key="index"
                                    class="fa-star"
                                    :class="
                                        index < calcAverage() ? 'fas' : 'far'"
                                >
                                </i>
                            </h6>
                        </div>
                    </div>

                    <div class="reviews col-12 col-md-8">
                        <h5 class="text-center mb-3">Recensioni:</h5>
                        <div
                            v-for="(review, key) in doctor_profile.reviews"
                            :key="key"
                            class="review"
                        >
                            <h5>
                                Nome utente:
                                {{ review.user_review_name }}
                            </h5>
                            <h6>
                                <i
                                    v-for="(int, index) in 5"
                                    :key="index"
                                    class="fa-star"
                                    :class="index < review.vote ? 'fas' : 'far'"
                                >
                                </i>
                            </h6>
                            <p>{{ review.content }}</p>
                        </div>
                    </div>
                </div>
                <div class="doctor-details my-5">
                    <h5>
                        Riguardo dr. {{ doctor_profile.first_name }}
                        {{ doctor_profile.last_name }}
                    </h5>
                    <p>{{ doctor_profile.cv }}</p>
                </div>
            </div>
            <div class="forms d-flex flex-column col-lg-4 col-md-12">
                <div class="form-top">
                    <div id="messages" class="mb-4">
                        <Messages :doctor_id="doctorId" />
                    </div>
                </div>
                <div class="form-bottom">
                    <div id="reviews" class="">
                        <Reviews :doctor_id="doctorId" />
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
            doctorId: null,
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
        calcAverage() {
            var total = 0,
                length = this.doctor_profile.reviews.length;

            for (var i = 0; i < length; i++) {
                total += parseFloat(this.doctor_profile.reviews[i].vote);
            }

            return parseInt(total / length);
        },
    },
    mounted() {
        this.getDoctorBySlug();
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/guest/_vars.scss";

.doctor {
    min-height: 300px;
    padding: 20px 30px;
    color: rgb(0, 35, 75);
    img {
        border-radius: 50%;
    }
    .doc-top {
        padding-bottom: 30px;
        border-bottom: 1px solid lightgray;
        .picture {
            height: 210px;
            width: 210px;
            margin-right: 1rem;
            .img-fluid{
                width: 100%;
                height: auto;
                max-height: 100%;
                object-fit: cover;
                object-position: top;
            }
        }
    }
    .doc-bottom {
        padding: 30px 0;
        border-bottom: 1px solid lightgray;
        .vote {
            border-right: 1px solid lightgray;
            .fa-star {
                color: $fourth-color;
            }
        }
        .reviews {
            height: 400px;
            overflow: auto;
            // border-left: 2px solid lightgray;
            padding: 0 30px;
            &::-webkit-scrollbar {
                display: block;
            }
            .fa-star {
                color: $third-color;
            }
        }
    }
    .doctor-details {
        border-bottom: 4px solid rgb(240, 240, 240);
        padding-bottom: 50px;
    }
}
.forms {
    min-height: 300px;
    padding: 20px 30px;
    background-color: rgb(247, 248, 249);
    border: 1px solid lightgrey;

    .form-top {
        border-bottom: 2px solid lightgray;
        margin-bottom: 30px;
    }
}
</style>
