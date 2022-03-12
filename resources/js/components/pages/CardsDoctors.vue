<template>
    <!-- <div class="col-3">
        <div class="card-doctor">
            <div class="top-card-doctor">
                <img src='doctorInfo.photo' alt="...">
            </div>
            <div class="bottom-card-doctor">
                <h4>{{doctorInfo.first_name}} {{doctorInfo.last_name}}</h4>
                <router-link :to="{ name: 'DoctorPage' , params: { DoctorPage: JSON.stringify(doctorInfo) } }">Vai al profilo</router-link>
                <strong>Vote: </strong>
                <i
                    v-for="(item, index) in 5"
                    :key="index"
                    class="fa-star"
                    :class="index < getAvgVote() ? 'fas' : 'far'"
                ></i>
            </div>

        </div>
    </div> -->


            <div class="card-doctor">
                <!-- <div v-if="doctorInfo.premium_options > 1" class="favicon">
                    <i class="fas fa-crown"></i>
                </div> -->

                <div v-if="doctorInfo.photo === null" class="picture">
                    <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Missing_avatar.svg/240px-Missing_avatar.svg.png">
                </div>

                <div v-if="doctorInfo.photo.substring(0,4) != 'http' && doctorInfo.photo != null" class="picture">
                    <img class="img-fluid" :src="`http://127.0.0.1:8000/storage/${doctorInfo.photo}`">
                </div>

                <div v-else-if="doctorInfo.photo.substring(0,4) == 'http' && doctorInfo.photo != null" class="picture">
                    <img class="img-fluid" :src="doctorInfo.photo">
                </div>

                <!-- </div> -->
                <div class="team-content">
                    <h3 class="name"> {{doctorInfo.first_name}} {{doctorInfo.last_name}}</h3>
                    <h5>{{ doctorInfo.specializations[0].name }}</h5>
                    <span class="my-2 address">{{doctorInfo.address}}</span>
                    <h5 class="vote my-3">
                        <i
                        v-for="(int, index) in 5"
                        :key="index"
                        class="fa-star"
                        :class="index < calcAverage() ? 'fas' : 'far'"
                        >
                        </i>
                    </h5>
                </div>
                <div class="button-profile">
                    <router-link class="btn btn-doctors text-white" :to="{ name: 'DoctorPage' , params: { slug: doctorInfo.slug } }">
                        Vai al Profilo
                        <i class="fas fa-mouse-pointer ml-1"></i>
                    </router-link>
                </div>
            </div>

</template>

<script>
export default {
    name: "CardsDoctors",
    props: {
        doctorInfo: Object,
    },
    methods: {
        calcAverage() {
            var total = 0,
                length = this.doctorInfo.reviews.length;

            for (var i = 0; i < length; i++) {
                total += parseFloat(this.doctorInfo.reviews[i].vote);
            }

            return parseInt(total / length);
        },
    },
};
</script>

<style lang="scss" scoped>
// .card-doctor
//     margin: 15px 0;
//     border-radius: 15px;
//     padding: 10px;
//

.card-doctor {
    width: 280px;
  padding: 30px 0;
  margin: 1rem;
  background-color: #f5f5f5;
  text-align: center;
  overflow: hidden;
  position: relative;
  border-radius:  10px;
  box-shadow: 3px 10px 10px#b5b7b9;
  transition: all 0.5s ease 0s;
  &:hover{
    box-shadow: 8px 18px 15px#b5b7b9;
  }
    .no-vote{
    font-size: 12px;
    padding: 13px 0;
    }
    .name{
    font-size: 22px;
    }
    .address{
        font-size: 14px;
    }
}

.card-doctor .picture {
  display: inline-block;
  height: 130px;
  width: 130px;
  margin-bottom: 30px;
  z-index: 1;
  position: relative;
}

.card-doctor .picture::before {
  content: "";
  width: 100%;
  height: 0;
  border-radius: 50%;
  background-color: rgb(0, 35, 75);
  position: absolute;
  bottom: 135%;
  right: 0;
  left: 0;
  opacity: 0.9;
  transform: scale(3);
  transition: all 0.3s linear 0s;
}

.card-doctor:hover .picture::before {
  height: 100%;
}

.card-doctor .picture::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: rgb(0, 35, 75);
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
}

.card-doctor .picture img {
  width: 100%;
  height: auto;
  max-height: 100%;
  object-fit: cover;
  object-position: top;
  border-radius: 50%;
  transform: scale(1);
  transition: all 0.9s ease 0s;
}

.card-doctor:hover .picture img {
  transform: scale(0.85);
}

.card-doctor:hover .btn-doctors{

    transition: all 0.7s;
    background-color: rgb(255, 240, 75);
    color: rgb(0, 35, 75) !important;
    font-weight: 600;
}

.card-doctor .vote {
  display: block;
  font-size: 15px;
  color: #4e5052;
  text-transform: capitalize;
}

.btn-doctors{
    padding: 5px 10px;
    background-color: rgb(0, 35, 75);
}

.name{
    min-height: 60px;
}






</style>
