<template>
    <form @submit="sendMessage" action="http://127.0.0.1:8000/api/message/" method="POST">
        <div class="form-row">
            <input type="hidden" name="user_id" id="user_id" :value="doctor_id"/>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    v-model="email"
                    required
                />
                <p v-if="error.email" class="errors">{{ error.email[0] }}</p>
            </div>
            <div class="form-group col-md-6">
                <label for="first_name">Nome</label>
                <input
                    type="text"
                    class="form-control"
                    name="first_name"
                    id="first_name"
                    v-model="name"
                    required
                />
                <p v-if="error.name" class="errors">{{ error.name[0] }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="d-block" for="content">Messaggio</label>
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

<style lang="scss" scoped></style>
