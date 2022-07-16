<template>
    <section class="page-title-banner"
             style="background-image:url(//hotel-booking-backend-master/assets/client/img/banner.jpg);">
        <div class="container">
            <div class="row">
                <div class="tr-list-detail">
                    <div class="tr-list-thumb">
                        <img src="//hotel-booking-backend-master/assets/client/img/no-user-img.jpg"
                             class="img-responsive img-circle" alt=""/>
                    </div>
                    <div v-if="room.apartment" class="tr-list-info">
                        <h4>{{ room.apartment.manager.last_name }} {{ room.apartment.manager.first_name }}</h4>
                        <p>Менеджер</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-header-nav padd-0 bb-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">

                </div>

                <div v-if="room.apartment" class="col-md-4 col-sm-4">
                    <div class="fl-right">
                        <a :href="`tel:${room.apartment.manager.phone}`" class="btn theme-btn">
                            <span class="fa fa-paper-plane mrg-r-10"></span>
                            Зателефонуйте нам
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============== Hotel Detail ====================== -->
    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-12">
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Overview">

                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="fa fa-star-o"></i>Перегляд кімнати</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <div class="row">

                                            <div class="col-md-6 col-sm-6">
                                                <div class="list-thumb-box">
                                                    <img
                                                        :src="'http://hotel-booking-backend-master' + room.preview_image"
                                                        class="img-responsive" alt="">
                                                    <h5 v-if="room.apartment">
                                                        {{ room.apartment.star_rate }}/<sub class="theme-cl">5</sub>
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="list-overview-detail">
                                                    <h5>{{ room.title }}
                                                        <!--<sup class="cl-success">№735-А</sup>-->
                                                    </h5>
                                                    <ul class="extra-service">
                                                        <li v-if="room.apartment">
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <i class=" ti-location-pin"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        {{ room.apartment.title }},
                                                                        {{ room.apartment.address }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li v-if="room.apartment">
                                                            <div class="icon-box-icon-block">
                                                                <a :href="`mailto:${room.apartment.manager.email}`">
                                                                    <div class="icon-box-round">
                                                                        <i class="ti-email"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        {{ room.apartment.manager.email }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li v-if="room.apartment">
                                                            <div class="icon-box-icon-block">
                                                                <a :href="`tel:${room.apartment.manager.phone}`">
                                                                    <div class="icon-box-round">
                                                                        <i class="ti-headphone-alt"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        {{ room.apartment.manager.phone }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li v-if="room.apartment">
                                                            <div class="icon-box-icon-block">
                                                                <div class="icon-box-round">
                                                                    <i class="ti-comment-alt"></i>
                                                                </div>
                                                                <div class="icon-box-text">
                                                                    {{ room.apartment.comments.length }} коментарів
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-if="room.apartment" class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-crown"></i>Зручності</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <ul class="amenities third">
                                            <li v-for="feature in room.features">{{ feature.title }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div v-if="room.apartment" class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-thumb-up"></i>Особливості помешкання</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <div class="row">

                                            <div v-for="leisureActivity in room.apartment.leisureActivities"
                                                 class="col-md-4 col-sm-6">
                                                <div class="listing-features">
                                                    <div class="listing-features-box">
                                                        <div class="listing-features-thumb">
                                                            <img :src="leisureActivity.image" class="img-responsive"
                                                                 alt="">
                                                        </div>
                                                        <div class="listing-features-detail">
                                                            <h4>{{ leisureActivity.title }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-files"></i>Опис кімнати</h4>
                                    </div>
                                    <div v-html="room.description" class="tr-single-body">

                                    </div>
                                </div>
                            </div>

                            <div v-if="room.gallery" class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-gallery"></i>Галерея</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <ul class="gallery-list">
                                            <li v-for="image in room.gallery">
                                                <a data-fancybox="gallery" :href="image">
                                                    <img :src="image" class="img-responsive" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div v-if="room.apartment && room.apartment.comments.length > 0" class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="fa fa-star-o"></i>Рейтинг</h4>
                                    </div>
                                    <div v-if="room.apartment" class="tr-single-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="review_summary">
                                                    <strong>{{ room.apartment.average_rate }}</strong>
                                                    <em v-if="room.apartment.average_rate >= 4"
                                                        class="cl-success">Супер</em>
                                                    <em v-if="room.apartment.average_rate < 4 && room.apartment.average_rate >= 3"
                                                        style="color: #f0ad4e">Добре</em>
                                                    <em v-if="room.apartment.average_rate < 3" style="color: #d9534f ">Погано</em>
                                                    <small>Пораховано на основі {{ room.apartment.comments.length }}
                                                        відгуків</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sidebar Start -->
                <div class="col-md-4 col-sm-12">

                    <div v-if="room.apartment" class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>
                                <router-link :to="{name: 'apartments.show', params: {slug: room.apartment.slug}}">
                                    {{ room.apartment.title }}
                                </router-link>
                                <sup class="cl-success"> Україна, {{ room.apartment.city.title }}</sup>
                            </h4>
                        </div>

                        <div v-if="room.apartment" class="tr-single-body">
                            <ul class="extra-service half">
                                <li>
                                    <div class="icon-box-icon-block">
                                        <div class="icon-box-round">
                                            <i class="ti-comment-alt"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            {{ room.apartment.comments.length }} відгуків
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <div class="icon-box-round">
                                            <i class="ti-user"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Розразовано на {{ room.members }} чоловік
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <div class="icon-box-round">
                                            <i class="ti-timer"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            До центру міста {{ room.apartment.distance.title }} метрів
                                        </div>
                                    </div>
                                </li>

                                <li v-if="room.apartment" v-for="meal in room.apartment.meals">
                                    <div class="icon-box-icon-block">
                                        <div class="icon-box-round">
                                            <i class="ti-heart"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            {{ meal.title }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <!-- overview & booking Form -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <div class="entry-meta">
                                <div class="meta-item meta-comment fl-right">
                                    <div class="view-box">
                                        <div class="fl-right">
                                            <h4 class="font-20">
                                                <span class="theme-cl font-20"></span>
                                                {{ room.price }} грн.<sub>/доба</sub>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr-single-body">
                            <h6 v-if="user.length < 1">Увійдіть у систему, аби мати можливіть забронювати помешкання</h6>
                            <form v-if="user && user.verified" class="book-form">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>В'їзд</label>
                                            <input class="form-control JS--date-input" type="text"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')"
                                                   v-model="booking_check_in" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Виїзд</label>
                                            <input class="form-control JS--date-input" type="text"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')"
                                                   v-model="booking_check_out" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 mrg-top-15">
                                        <button @click.prevent="bookRoom()" type="submit"
                                                class="btn btn-arrow theme-btn full-width">Забронювати
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>
                <!-- /col-md-4 -->
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Show",

    mounted() {
        this.getRoom()
        this.getUser()
    },

    data() {
        return {
            room: [],
            user: [],

            booking_check_in: [],
            booking_check_out: [],

            message: '',
            errors: '',
        }
    },

    methods: {
        getRoom(slug) {
            this.axios.get(`/api/rooms/${this.$route.params.slug}`)
                .then(response => {
                    this.room = response.data.data
                    console.log(response.data.data);
                })
                .catch(error => console.log(error.response.data))
        },

        getUser() {
            this.axios.get('/api/user').then(response => {
                console.log(response.data);
                this.user = response.data;
            }).catch(e => {
                if (e.response.status === 401) {
                    console.log(e.response.data);
                    this.user = false;
                }
            });
        },

        bookRoom() {
            this.axios.post(`/api/book-room/${this.$route.params.slug}`, {
                'date_range': this.booking_check_in.length > 0 && this.booking_check_out.length > 0 ? this.booking_check_in + ',' + this.booking_check_out : [],
                'user_id': this.user.id,
                'room_id': this.room.id,

            })
                .then(response => {
                    console.log(response);
                    this.message = response.data.message;
                    swal({
                        title: "Успішно!",
                        text: this.message,
                        icon: "success",
                        button: "Закрити",
                    });
                })
                .catch(e => {
                    if (e.response.status === 422) {
                        console.log(e.response.data);
                        this.message = e.response.data.message;
                        this.errors = e.response.data.errors;
                    }
                    swal({
                        title: "Сталась помилка",
                        text: this.message,
                        icon: "error",
                        button: "Закрити",
                    });
                });
        },
    },
}
</script>

<style scoped>

</style>
