<template>
    <form @submit.prevent="sendReview" action="http://127.0.0.1:8000/api/review/" method="POST">
        <div class="form-row">
            <input type="hidden" name="user_id" id="user_id" :value="doctor_id"/>
            <div class="form-group col-md-6">
                <label for="vote">Voto (da 1 a 5)</label>
                <input
                    type="number"
                    min="1"
                    max="5"
                    class="form-control"
                    id="vote"
                    name="vote"
                    v-model="vote"
                    required
                />
                <p v-if="error.vote" class="errors">{{ error.vote[0] }}</p>
            </div>
            <div class="form-group col-md-6">
                <label for="user_review_name">Nome</label>
                <input
                    type="text"
                    class="form-control"
                    name="user_review_name"
                    id="user_review_name"
                    v-model="review_name"
                />
                <p v-if="error.user_review_name" class="errors">{{ error.user_review_name[0] }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="d-block" for="content">Recensione</label>
            <textarea
                name="content"
                id="content"
                cols="50"
                rows="5"
                v-model="content"
                required
            ></textarea>
            <p v-if="error.content" class="errors">{{ error.content[0] }}</p>
        </div>
        <!-- <div class="form-group">
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="gridCheck"
                />
                <label class="form-check-label" for="gridCheck">
                   Privacy Policy
                </label>
            </div>
        </div> -->
        <button
            type="submit"
            class="btn btn-primary"
            :disabled="sending"
        >{{ sending ? 'invio in corso' : 'invia'}}</button>
    </form>
</template>

<script>
export default {
    name: "Reviews",
    props: {
        doctor_id: Number
    },
    data() {
        return {
            apiReview: 'http://127.0.0.1:8000/api/review/',
            vote: 1,
            review_name: '',
            content: '',
            sending: false,
            success: false,
            error: {},
            id_doctor: ''
        }
    },
    methods: {
        sendReview(){
            this.sending=true;
            this.success=false;
            axios.post(this.apiReview).then(res=>{
                this.sending=false;
                if(!res.data.success) {
                    this.error = res.data.error;
                }else {
                    this.success= true;
                    this.error = {};
                    this.vote = 1;
                    this.review_name = '';
                    this.content = '';
                }
            })
        },
    },
};
</script>

<style lang="scss" scoped></style>

