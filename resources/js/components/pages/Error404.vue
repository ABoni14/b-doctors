<template>
    <div class="container-fluid custom_container">
        <div class="mainbox">
            <div class="err">4</div>
            <i class="far fa-question-circle fa-spin"></i>
            <div class="err2">4</div>
            <div class="msg">
                Questa pagina è stata spostata oppure è in quarantena?
                Non è mai esistita?
                <p class="my-4">Torna alla pagina <a @click="backToHome()" href="">Home</a> e riproviamo!</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Error404",
    methods: {
        backToHome() {
            this.$router.replace({ name: "home" });
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/guest/_vars.scss";
.custom_container {
    .mainbox {
        margin: auto;
        height: 600px;
        max-width: 600px;
        position: relative;
    }

    .err {
        color: $primary-color;
        font-family: "Nunito Sans", sans-serif;
        font-size: 11rem;
        position: absolute;
        left: 20%;
        top: 8%;
    }

    .far {
        position: absolute;
        font-size: 8.5rem;
        left: 42%;
        top: 15%;
        color: $primary-color;
    }

    .err2 {
        color: $primary-color;
        font-family: "Nunito Sans", sans-serif;
        font-size: 11rem;
        position: absolute;
        left: 68%;
        top: 8%;
    }

    .msg {
        text-align: center;
        font-family: "Nunito Sans", sans-serif;
        font-size: 1.6rem;
        position: absolute;
        left: 16%;
        top: 45%;
        width: 75%;
    }

    a {
        text-decoration: none;
        color: $fourth-color;
        font-style: italic;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }
}
</style>

