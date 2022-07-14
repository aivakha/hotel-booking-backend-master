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
                                                    <em v-if="room.apartment.average_rate >= 4" class="cl-success">Супер</em>
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
                            <form class="book-form">

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>В'їзд</label>
                                            <input class="form-control JS--date-input" type="date" value="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Виїзд</label>
                                            <input class="form-control JS--date-input" type="date" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Дорослих</label>
                                            <input type="number" name="adult" value="1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Дітей</label>
                                            <input type="number" name="children" value="0" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 mrg-top-15">
                                        <a href="#" class="btn btn-arrow theme-btn full-width">Забронювати</a>
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
    },

    data() {
        return {
            room: [],
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
    },
}
</script>

<style scoped>

</style>
