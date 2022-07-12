<template>
    <div>
        <section class="main-banner scroll-con-sec hero-section" data-scrollax-parent="true">
            <div class="slideshow-container">
                <!-- slideshow-item -->
                <div class="slideshow-item">
                    <div class="bg" data-bg="assets/client/img/banner-2.jpg"></div>
                </div>
                <!--  slideshow-item end  -->
                <!-- slideshow-item -->
                <div class="slideshow-item">
                    <div class="bg" data-bg="assets/client/img/banner-3.jpg"></div>
                </div>
                <!--  slideshow-item end  -->
                <!-- slideshow-item -->
                <div class="slideshow-item">
                    <div class="bg" data-bg="assets/client/img/banner-4.jpg"></div>
                </div>
                <!--  slideshow-item end  -->
            </div>
            <div class="overlay"></div>
            <div class="hero-section-wrap fl-wrap">
                <div class="container">
                    <div class="intro-item fl-wrap">
                        <div class="caption text-center cl-white">
                            <h2>Discover Your Next Adventure</h2>
                            <p>Expolore top rated hotels around the world</p>
                        </div>

                        <form>
                            <fieldset class="home-form-1">

                                <div class="col-md-2 col-sm-2 padd-0">
                                    <input type="text" class="form-control" placeholder="City">
                                </div>

                                <div class="col-md-2 col-sm-2 padd-0">
                                    <input class="form-control JS--date-input" type="text" onfocus="(this.type='date')"
                                           onblur="(this.type='text')" placeholder="Check In">
                                </div>

                                <div class="col-md-2 col-sm-2 padd-0">
                                    <input class="form-control JS--date-input" type="text" onfocus="(this.type='date')"
                                           onblur="(this.type='text')" placeholder="Check Out">
                                </div>

                                <div class="col-md-2 col-sm-2 padd-0">
                                    <input class="form-control" type="number" placeholder="Adults" min="0">
                                </div>

                                <div class="col-md-2 col-sm-2 padd-0">
                                    <input class="form-control" type="number" placeholder="Children" min="0">
                                </div>


                                <div class="col-md-2 col-sm-2 padd-0">
                                    <button type="submit" class="btn theme-btn cl-white seub-btn">FIND HOTEL</button>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>

        <section class="destination gray-bg">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <span class="theme-cl">Шукай своє житло</span>
                            <h1>Найбільш популярні кімнати</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div v-for="room in rooms" class="col-md-4 col-sm-4">
                        <article class="tour-box style-1">
                            <!-- Single Tour -->
                            <div class="tour-box-image">
                                <figure>
                                    <router-link :to="{name: 'rooms.show', params: {slug: room.slug}}">
                                        <img :src="room.preview_image" class="img-responsive listing-box-img" alt="">
                                        <div class="list-overlay"></div>
                                    </router-link>
                                    <h4 class="destination-place">
                                        <router-link :to="{name: 'rooms.show', params: {slug: room.slug}}">
                                            {{ room.title }}
                                        </router-link>
                                    </h4>
                                </figure>
                            </div>
                            <div class="entry-meta">
                                <div class="meta-item meta-author">
                                    <div class="coauthors">
                                    <span class="vcard author">
                                    <span class="fn">
                                    <a href="#">
                                        <img alt="" src="//hotel-booking-backend-master/assets/client/img/no-user-img.jpg" class="avatar avatar-24" height="24" width="24">
                                        {{ room.apartment.manager.last_name }} {{ room.apartment.manager.first_name }}
                                    </a>
                                    </span>
                                    </span>
                                    </div>
                                </div>
                                <div class="meta-item meta-comment fl-right">
                                    <i class="ti-comment-alt"></i><span>{{ room.apartment.comments.length }}</span>
                                </div>
                                <div class="meta-item meta-rating fl-right">
                                    <i v-for="n in room.apartment.star_rate" class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="inner-box">
                                <div class="box-inner-ellipsis">
                                    <h4 class="entry-title">
                                        <a href="#">{{ room.apartment.city.title }}</a>
                                    </h4>
                                    <div class="price-box">
                                        <div class="tour-price fl-right">
                                            <i class="ti ti-user"></i><span class="theme-cl f-bold">{{ room.price }} грн</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </section>
        <div class="clearfix"></div>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <span class="theme-cl">Оберіть помешкання</span>
                            <h1>Популярні апартаменти</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div v-for="apartment in apartments" class="col-md-4 col-sm-4">
                        <article class="tour-box style-1">
                            <!-- Single Tour -->
                            <div class="tour-box-image">
                                <figure>
                                    <router-link :to="{name: 'apartments.show', params: {slug: apartment.slug}}">
                                        <img :src="apartment.preview_image" class="img-responsive listing-box-img" alt="">
                                        <div class="list-overlay"></div>
                                    </router-link>
                                    <h4 class="destination-place">
                                        <router-link :to="{name: 'apartments.show', params: {slug: apartment.slug}}">
                                            {{ apartment.title }}
                                        </router-link>
                                    </h4>
                                </figure>
                            </div>
                            <div class="entry-meta">
                                <div class="meta-item meta-author">
                                    <div class="coauthors">
                                    <span class="vcard author">
                                    <span class="fn">
                                    <a href="#">
                                        <img alt="" src="//hotel-booking-backend-master/assets/client/img/no-user-img.jpg" class="avatar avatar-24" height="24" width="24">
                                        {{ apartment.manager.last_name }} {{ apartment.manager.first_name }}
                                    </a>
                                    </span>
                                    </span>
                                    </div>
                                </div>
                                <div class="meta-item meta-comment fl-right">
                                    <i class="ti-comment-alt"></i><span>{{ apartment.comments.length }}</span>
                                </div>
                                <div class="meta-item meta-rating fl-right">
                                    <i v-for="n in apartment.star_rate" class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="inner-box">
                                <div class="box-inner-ellipsis">
                                    <h4 class="entry-title">
                                        <a href="#">{{ apartment.city.title }}</a>
                                    </h4>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </section>
        <div class="clearfix"></div>

    </div>
</template>

<script>
export default {
    name: 'Index',

    mounted() {
        this.getRandomRooms()
        this.getRandomApartments()
    },

    data() {
        return {
            rooms: [],
            apartments: [],
        }
    },

    methods: {
        getRandomRooms() {
            this.axios.get('/api/random-rooms')
                .then(response => {
                    this.rooms = response.data.data;
                    console.log(response.data.data);
                });
        },

        getRandomApartments() {
            this.axios.get('/api/random-apartments')
                .then(response => {
                    this.apartments = response.data.data;
                    console.log(response.data.data);
                });
        }

    },
}
</script>

<style scoped>

</style>
