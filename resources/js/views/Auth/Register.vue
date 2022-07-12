<template>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form action="" @submit.prevent="handleRegister">
        <div class="form-group">
            <label>Імя</label>
            <input type="text" class="form-control" v-model="formData.first_name">
        </div>

        <div class="form-group">
            <label>Прізвище</label>
            <input type="text" class="form-control" v-model="formData.last_name">
        </div>

        <div class="form-group">
            <label>Стать</label>
            <input type="radio" value="Чоловік" v-model="formData.gender">
            <label>Чоловік</label>
            <br>
            <input type="radio" value="Жінка" v-model="formData.gender">
            <label>Жінка</label>
        </div>

        <div class="form-group">
            <label>Телефон</label>
            <input type="text" class="form-control" v-model="formData.phone">
        </div>

        <div class="form-group">
            <label>Пошта</label>
            <input type="text" class="form-control" v-model="formData.email">
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password" class="form-control" v-model="formData.password">
        </div>

        <div class="form-group">
            <label>Підтвердіть Пароль</label>
            <input type="password" class="form-control" v-model="formData.password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>
export default {
    name: "Register",

    data() {
        return {
            formData: {
                first_name: '',
                last_name: '',
                gender: '',
                phone: '',
                email: '',
                password: '',
                password_confirmation: '',
            }
        }
    },

    mounted() {
        this.getUser()
    },

    methods: {
        handleRegister() {
            this.axios.get('/sanctum/csrf-cookie').then(response => {
                this.axios.post('api/register', this.formData).then(response => {
                    console.log(response);
                });
            });
        },

        getUser() {
            this.axios.get('api/user').then(response => {
                console.log(response);
            });
        },
    }
}
</script>

<style scoped>

</style>
