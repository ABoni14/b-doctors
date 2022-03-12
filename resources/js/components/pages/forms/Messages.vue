<template>
    <div>
         <h5 class="my-3 font-weight-bold text-center">Manda un messaggio al medico</h5>
        <form @submit="sendMessage" action="http://127.0.0.1:8000/api/message/" method="POST">

            <div class="form">
                <input type="hidden" name="user_id" id="user_id" :value="doctor_id"/>

                <div class="txt_field">

                    <label for="email"></label>
                    <input
                        type="email"
                        placeholder="Email"
                        id="email"
                        name="email"
                        v-model="email"
                        required
                    />
                    <p v-if="error.email" class="errors">{{ error.email[0] }}</p>
                </div>
                <div class="txt_field">
                    <label for="first_name"></label>
                    <input
                        type="text"
                        placeholder="Nome e Cognome"
                        name="first_name"
                        id="first_name"
                        v-model="name"
                        required
                    />
                    <p v-if="error.name" class="errors">{{ error.name[0] }}</p>
                </div>
            </div>
            <div>
                <label class="d-block" for="content"></label>
                <textarea
                    name="content"
                    id="content"
                    placeholder="Scrivi il tuo messaggio"
                    rows="5"
                    v-model="content"
                    required
                ></textarea>
                <p v-if="error.content" class="errors">{{ error.content[0] }}</p>
            </div>

            <button
                type="submit"
                class="btn"
                :disabled="sending"
            >{{ sending ? 'invio in corso' : 'Invia'}}</button>
        </form>
    </div>

</template>

<script>
export default {
    name: "Messages",
    props: {
        doctor_id: Number
    },
    data() {
        return {
            apiMessage: 'http://127.0.0.1:8000/api/message/',
            email: '',
            name: '',
            content: '',
            sending: false,
            success: false,
            error: {},
            id_doctor: ''
        }
    },
    methods: {
        sendMessage(){
            this.sending=true;
            this.success=false;
            axios.post(this.apiMessage).then(res=>{
                this.sending=false;
                if(!res.data.success) {
                    this.error = res.data.error;
                }else {
                    this.success=true;
                    this.error = {};
                    this.email = '';
                    this.name = '';
                    this.content = '';
                }
            })
        },
    },
};
</script>

<style lang="scss" scoped>
@import '../../../../sass/guest/_vars.scss';

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
          background-color: white;
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
      background: $fourth-color;
      border-radius: 5px;
      font-size: 18px;
      color: white;
      font-weight: 700;
      cursor: pointer;
      outline: none;
      margin-top: 20px;
      &:hover{
        background-color: $third-color;
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
          background-color: white;
        }
    }
  }

</style>
