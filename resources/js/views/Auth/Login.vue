<template>

    <div class="page-title image-title"
         style="background-image:url(//hotel-booking-backend-master/assets/client/img/tour.jpg);">
        <div class="container">
            <div class="page-title-wrap">
                <h2>Увійдіть до облікового запису</h2>
            </div>
        </div>
    </div>

    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div v-if="errors || message" class="client-errors">
                        <ul v-if="errors" class="ul" v-for="(field, k) in errors" :key="k" style="list-style: none">
                            <li v-for="error in field" :key="k" style="color: #ff526c">
                                {{ error }}
                            </li>
                        </ul>

                        <ul v-if="message" class="ul"  style="list-style: none">
                            <li style="color: #ff526c">{{ message }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <form action="" class="form" @submit.prevent="handleLogin">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Пошта*</label>
                            <input type="text" class="form-control" name="email" v-model="formData.email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Пароль*</label>
                            <input type="password" class="form-control" name="password" v-model="formData.password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Увійти</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: "Login",

    data() {
        return {
            formData: {
                email: '',
                password: '',
            },
            errors: [],
            message: '',
        }
    },

    mounted() {
        this.getUser()
    },

    methods: {
        handleLogin() {
            this.axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    this.axios.post('api/login', this.formData)
                        .then(response => {
                            window.location.href = 'http://hotel-booking-backend-master/admin';
                            console.log(response);
                        })
                        .catch(e => {
                            if (e.response.status === 422 || e.response.status === 401) {
                                console.log(e.response.data);
                                this.message = e.response.data.message;
                                this.errors = e.response.data.errors;
                            }
                        });
                });
        },

        getUser() {
            this.axios.get('api/user').then(response => {
                console.log(response);
                if (!response) {
                    this.$router.push({name: 'home'});
                } else {
                    window.location.href = 'http://hotel-booking-backend-master/admin';
                }
            });
        },
    }
}
</script>

<style scoped>

</style>
