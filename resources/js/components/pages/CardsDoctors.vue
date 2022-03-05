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


            <div class="card-doctor mx-3">
                <div class="picture">
                    <img class="img-fluid" :src="doctorInfo.photo">
                </div>
                <div class="team-content">
                    <h3 class="name"> {{doctorInfo.first_name}} {{doctorInfo.last_name}}</h3>
                    <span class="my-2">{{doctorInfo.address}}</span>
                    <h4 class="vote my-3">voto</h4>
                </div>
                <div class="button-profile">
                    <router-link class="btn btn-doctors text-white" :to="{ name: 'DoctorPage' , params: { id: doctorInfo.id } }">Vai al Profilo</router-link>
                </div>
            </div>

</template>

<script>
export default {
    name: "card-doctorsDoctors",
    props: {
        doctorInfo: Object,
    },
    methods: {
        getAvgVote(){
            for(var i = 0; i < this.doctorInfo.reviews.length; i++){
                let vote = this.doctorInfo.reviews.vote;
                console.log(vote);

            }
        }
    }
};
</script>

<style lang="scss" scoped>
// .card-doctor
//     margin: 15px 0;
//     border-radius: 15px;
//     padding: 10px;
//

.card-doctor {
    width: 250px;
  padding: 20px 0;
  margin-bottom: 30px;
  background-color: #f7f5ec;
  text-align: center;
  overflow: hidden;
  position: relative;
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
  background-color: #1369ce;
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
  background-color: #1369ce;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
}

.card-doctor .picture img {
  width: 100%;
  height: auto;
  border-radius: 50%;
  transform: scale(1);
  transition: all 0.9s ease 0s;
}

.card-doctor:hover .picture img {
  box-shadow: 0 0 0 14px #f7f5ec;
  transform: scale(0.7);
}



.card-doctor .vote {
  display: block;
  font-size: 15px;
  color: #4e5052;
  text-transform: capitalize;
}

.btn-doctors{
    padding: 5px 10px;
    background-color: #1369ce;

}

.btn-doctors:hover{
    border-radius: 20px;
    transition: all 1s;
}



</style>
