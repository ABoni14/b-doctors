<template>
    <div>
        <h5 class="my-3 font-weight-bold text-center">Lascia una recensione al medico</h5>
        <form @submit="sendReview" action="http://127.0.0.1:8000/api/review/" method="POST">
            <div class="form">
                <input type="hidden" name="user_id" id="user_id" :value="doctor_id"/>
                <div class="txt_field">
                    <label for="vote"></label>
                    <input
                        type="number"
                        min="1"
                        max="5"
                        placeholder="Voto (da 1 a 5)"
                        id="vote"
                        name="vote"
                        v-model="vote"
                        required
                    />
                    <p v-if="error.vote" class="errors">{{ error.vote[0] }}</p>
                </div>
                <div class="txt_field">
                    <label for="user_review_name"></label>
                    <input
                        type="text"
                        placeholder="Nome"
                        name="user_review_name"
                        id="user_review_name"
                        v-model="review_name"
                    />
                    <p v-if="error.user_review_name" class="errors">{{ error.user_review_name[0] }}</p>
                </div>
            </div>
            <div>
                <label class="d-block" for="content"></label>
                <textarea
                    name="content"
                    id="content"
                    placeholder="Recensione"
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
    </div>
    
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

<style lang="scss" scoped>
form{
    .txt_field{
      border-bottom: 2px solid #adadad;
      margin: 30px 0;
      input{
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
        &:focus, &:focus-visible{
          outline: 1px solid rgb(6, 92, 190);
        }
      }
      label{
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        font-size: 16px;
      }
    }
    button[type="submit"]{
      width: 100%;
      height: 50px;
      border: none;
      background: rgb(255, 240, 75);
      border-radius: 5px;
      font-size: 18px;
      color: rgb(0, 35, 75);
      font-weight: 700;
      cursor: pointer;
      outline: none;
      margin-top: 20px;
      &:hover{
        background-color: rgb(0, 35, 75);
        color: white;
        transition: .5s;
      }
    }
    textarea{
        width: 100%;
        padding: 10px 5px;
        border: 1px solid #adadad;
        border-bottom: 2px solid #adadad;
        background: none;
        outline: none;
        resize: none;
        &:focus, &:focus-visible{
          border: 1px solid rgb(6, 92, 190);
        }
    }
  }
</style>

