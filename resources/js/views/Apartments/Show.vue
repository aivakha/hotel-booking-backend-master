<template>
    <section class="page-title-banner"
             style="background-image:url(//hotel-booking-backend-master/assets/client/img/banner.jpg);">
        <div class="container">
            <div class="row">
                <div class="tr-list-detail">
                    <div class="tr-list-thumb">
                        <img src="//hotel-booking-backend-master/assets/client/img/no-user-img.jpg"
                             class="img-responsive img-circle" alt="">
                    </div>
                    <div v-if="apartment.manager" class="tr-list-info">
                        <h4>{{ apartment.manager.last_name }} {{ apartment.manager.first_name }}</h4>
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
                    <div class="tab" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Overview" aria-controls="home" role="tab"
                                                                      data-toggle="tab"><i class="ti-user"></i>Огляд</a>
                            </li>
                            <li v-if="apartment.comments" role="presentation">
                                <a href="#Review" aria-controls="messages" role="tab"
                                                       data-toggle="tab">
                                    <i class="ti-thumb-up"></i>
                                    Відгуки
                                </a>
                            </li>
                            <li role="presentation"><a href="#Photos" aria-controls="messages" role="tab"
                                                       data-toggle="tab"><i class="ti-gallery"></i>Галерея</a></li>
                        </ul>
                        <!-- Tab panes -->
                    </div>
                </div>

                <div v-if="apartment.manager" class="col-md-4 col-sm-4">
                    <div class="fl-right">
                        <a :href="`tel:${apartment.manager.phone}`" class="btn theme-btn">
                            <span class="fa fa-paper-plane mrg-r-10"></span>
                            Зателефонуйте нам
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-12">
                    <div class="tab-content tabs">

                        <div role="tabpanel" class="tab-pane fade in active" id="Overview">

                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="fa fa-star-o"></i>Перегляд апартаменту</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <div class="row">

                                            <div class="col-md-6 col-sm-6">
                                                <div class="list-thumb-box">
                                                    <img :src="apartment.preview_image" class="img-responsive" alt="">
                                                    <h5 v-if="apartment">
                                                        {{ apartment.star_rate }}/<sub class="theme-cl">5</sub>
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="list-overview-detail">
                                                    <h5>{{ apartment.title }}
                                                        <!--<sup class="cl-success">№735-А</sup>-->
                                                    </h5>
                                                    <ul class="extra-service">
                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <i class=" ti-location-pin"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        {{ apartment.title }}, {{ apartment.address }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li v-if="apartment.manager">
                                                            <div class="icon-box-icon-block">
                                                                <a :href="`mailto:${apartment.manager.email}`">
                                                                    <div class="icon-box-round">
                                                                        <i class="ti-email"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        {{ apartment.manager.email }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li v-if="apartment.manager">
                                                            <div class="icon-box-icon-block">
                                                                <a :href="`tel:${apartment.manager.phone}`">
                                                                    <div class="icon-box-round">
                                                                        <i class="ti-headphone-alt"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        {{ apartment.manager.phone }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li v-if="apartment.comments">
                                                            <div class="icon-box-icon-block">
                                                                <div class="icon-box-round">
                                                                    <i class="ti-comment-alt"></i>
                                                                </div>
                                                                <div class="icon-box-text">
                                                                    {{ apartment.comments.length }} коментарів
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

                            <div v-if="apartment" class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-thumb-up"></i>Особливості помешкання</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <div class="row">

                                            <div v-for="leisureActivity in apartment.leisureActivities"
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
                                        <h4><i class="ti-files"></i>Повний опис</h4>
                                    </div>
                                    <div v-html="apartment.full_description" class="tr-single-body">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-files"></i>Короткий опис</h4>
                                    </div>
                                    <div v-html="apartment.short_description" class="tr-single-body">

                                    </div>
                                </div>
                            </div>

                            <div v-if="apartment.average_rate > 0" class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="fa fa-star-o"></i>Рейтинг</h4>
                                    </div>
                                    <div v-if="apartment" class="tr-single-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="review_summary">
                                                    <strong>{{ apartment.average_rate }}</strong>
                                                    <em v-if="apartment.average_rate >= 4" class="cl-success">Супер</em>
                                                    <em v-if="apartment.average_rate < 4 && apartment.average_rate >= 3"
                                                        style="color: #f0ad4e">Добре</em>
                                                    <em v-if="apartment.average_rate < 3" style="color: #d9534f ">Погано</em>
                                                    <small>Пораховано на основі {{ apartment.comments.length }}
                                                        відгуків</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ============ Review =================== -->
                        <div role="tabpanel" class="tab-pane fade in" id="Review">

                            <!-- Review -->
                            <div v-if="apartment.comments" class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-write"></i>Всі відгуки</h4>
                                    </div>
                                    <div class="tr-single-body">

                                        <!-- Single Review -->
                                        <div v-for="comment in apartment.comments" class="review-box">
                                            <div class="review-thumb">
                                                <img
                                                    src="//hotel-booking-backend-master/assets/client/img/no-user-img.jpg"
                                                    class="img-responsive img-circle" alt="">
                                            </div>

                                            <div class="review-box-content">
                                                <div class="reviewer-rate">
                                                    <p><i class="fa fa-star cl-warning"></i>{{
                                                            comment.rate
                                                        }}/<span>5</span></p>
                                                </div>
                                                <div class="review-user-info">
                                                    <h4>{{ comment.author.last_name }} {{
                                                            comment.author.first_name
                                                        }}</h4>
                                                    <p>{{ comment.text }}</p>
                                                </div>
                                            </div>
                                        </div>

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

                                        <form v-if="user && user.verified" class="form" ref="commentForm">
                                            <div class="form-group">
                                                <label>Рейтинг</label>
                                                <input id="comment-rate" type="number" class="form-control" v-model="rate" max="5" min="1">
                                            </div>
                                            <div class="form-group">
                                                <label>Коментар</label>
                                                <input id="comment-text" type="text" class="form-control" v-model="text">
                                            </div>
                                            <div class="form-group text-center">
                                                <button @click.prevent="postComment()" type="submit" class="btn theme-btn full-width btn-m">
                                                    Коментувати
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- ============ Photos =================== -->
                        <div role="tabpanel" class="tab-pane fade in" id="Photos">
                            <div v-if="apartment.gallery" class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-gallery"></i>Галерея</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <ul class="gallery-list">
                                            <li v-for="image in apartment.gallery">
                                                <a data-fancybox="gallery" :href="image">
                                                    <img :src="image" class="img-responsive" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-md-4 col-sm-12">
                    <div v-if="apartment" class="tr-single-box">
                        <div class="tr-single-header">
                            <h4 v-if="apartment.city">{{ apartment.title }}<sup class="cl-success"> Україна,
                                {{ apartment.city.title }}</sup>
                            </h4>
                        </div>

                        <div v-if="apartment.comments" class="tr-single-body">
                            <ul class="extra-service half">
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-comment-alt"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                {{ apartment.comments.length }} відгуків
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <div class="icon-box-round">
                                            <i class="ti-user"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Розразовано на {{ apartment.members }} чоловік
                                        </div>
                                    </div>
                                </li>

                                <li v-if="apartment">
                                    <div class="icon-box-icon-block">
                                        <div class="icon-box-round">
                                            <i class="ti-home"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Кількість кімнат {{ apartment.rooms }}
                                        </div>
                                    </div>
                                </li>

                                <li v-for="meal in apartment.meals">
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
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Show",

    mounted() {
        this.getApartment()
        this.getUser()
    },

    data() {
        return {
            user: [],
            apartment: [],
            text: '',
            rate: '',
            message: '',
            errors: '',
        }
    },

    methods: {
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

        getApartment(slug) {
            this.axios.get(`/api/apartments/${this.$route.params.slug}`)
                .then(response => {
                    this.apartment = response.data.data
                    console.log(response.data.data);
                })
                .catch(error => console.log(error.response.data))
        },

        postComment() {
            this.axios.post('/api/comment', {
                'text': this.text,
                'rate': this.rate,
                'user_id': this.user.id,
                'apartment_id': this.apartment.id,
            })
                .then(response => {
                    console.log(response.data.data);
                    this.apartment.comments.push(response.data.data);
                    this.rate = '';
                    this.text = '';
                })
                .catch(e => {
                    if (e.response.status === 422) {
                        console.log(e.response.data);
                        this.message = e.response.data.message;
                        this.errors = e.response.data.errors;
                    }
                });
        },
    },
}
</script>

<style scoped>

</style>
