<template>
    <div class="col-3">
        <div class="card">
            <div class="top-card">
                <img src='doctorInfo.photo' alt="...">
            </div>
            <div class="bottom-card">
                <h4>{{doctorInfo.first_name}} {{doctorInfo.last_name}}</h4>

                <strong>Vote: </strong>
                <i
                    v-for="(item, index) in 5"
                    :key="index"
                    class="fa-star"
                    :class="index < getAvgVote() ? 'fas' : 'far'"
                ></i>
            </div>
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
.card{
    margin: 15px 0;
    border-radius: 15px;
    padding: 10px;
}
</style>
