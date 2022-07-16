<template>
    <div class="page-title image-title" style="background-image:url(//hotel-booking-backend-master/assets/client/img/tour.jpg);">
        <div class="container">
            <div class="page-title-wrap">
                <h2>Знайдіть Своє Житло</h2>
            </div>
        </div>
    </div>

    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <!-- Filter Sidebar -->
                <div class="col-md-4 col-sm-12">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>Форма пошуку</h4>
                            <span class="pull-right clickables" data-toggle="collapse" data-target="#filter_1"><i
                                class="ti-align-left"></i></span>
                        </div>
                        <div id="filter_1" class="collapse in">
                            <div class="search_box">
                                <div class="tr-single-body">
                                    <form action="" class="search_booking_form">
                                        <div class="sidebar-input">
                                            <!--second advanced method-->
                                            <!--<input v-model="city" v-on:input="getCities" type="text" class="form-control" placeholder="Місто">-->
                                            <select name="cities" id="cities" class="form-control" v-model="booking_city" v-on:change="filterRooms()">
                                                <option value="">Всі регіони</option>
                                                <option :value="city.id" v-for="(city, index) in cities">{{ city.title }}</option>
                                            </select>
                                        </div>
                                        <input v-model="booking_members" type="text" class="form-control" placeholder="К-сть людей" v-on:change="filterRooms()">
                                        <div class="sidebar-input">
                                            <input class="form-control JS--date-input" type="text" v-model="booking_check_in"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')"
                                                   placeholder="В'їзд*" v-on:change="filterRooms()">
                                        </div>
                                        <div class="sidebar-input">
                                            <input class="form-control JS--date-input" type="text" v-model="booking_check_out"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')"
                                                   placeholder="Відїзд*" v-on:change="filterRooms()">
                                        </div>
<!--                                        <button class="form-control" style="background-color: #ff4e00; color: #FFF"-->
<!--                                                type="submit">Пошук-->
<!--                                        </button>-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>Фільтр</h4>
                            <span class="pull-right clickables" data-toggle="collapse" data-target="#filter_2"><i
                                class="ti-align-left"></i></span>
                        </div>
                        <div id="filter_2" class="collapse in">
                            <!-- Range Slider -->
                            <div class="tr-inner-single-box" style="margin-top: 30px">
                                <div class="tr-single-header">
                                    <h4>Бюджет за ніч</h4>
                                </div>
                                <div class="tr-single-body">
                                    <form method="post">
                                        <div id="price-range" v-on:change="filterRooms()"></div>
                                    </form>
                                </div>
                            </div>

                            <!-- Room Type -->
                            <div class="tr-inner-single-box">
                                <div class="tr-single-header">
                                    <h4>Тип розміщення</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="side-list-check">
                                        <li v-for="apartment_type in filterList.apartment_types">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="apartment_types" :value="apartment_type.id" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            {{  apartment_type.title }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tr-inner-single-box">
                                <div class="tr-single-header">
                                    <h4>Тип ліжка</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="side-list-check">
                                        <li v-for="bed_type in filterList.bed_types">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="bed_types" :value="bed_type.id" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            {{  bed_type.title }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tr-inner-single-box">
                                <div class="tr-single-header">
                                    <h4>Харчування</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="side-list-check">
                                        <li v-for="meal in filterList.meals">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="meals" :value="meal.id" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            {{  meal.title }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Features -->
                            <div class="tr-inner-single-box">
                                <div class="tr-single-header">
                                    <h4>Відстань до центру</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="side-list-check">
                                        <li v-for="distance in filterList.distances">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="distances" :value="distance.id" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            {{  distance.title }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Distance to center -->
                            <div class="tr-inner-single-box">
                                <div class="tr-single-header">
                                    <h4>Чим зайнятись у вільний час</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="side-list-check">
                                        <li v-for="leisure_activity in filterList.leisure_activities">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="leisure_activities" :value="leisure_activity.id" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            {{  leisure_activity.title }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tr-inner-single-box">
                                <div class="tr-single-header">
                                    <h4>Оцінка за відгуками</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="side-list-check">
                                        <li v-for="comment_rate in filterList.comments_rate">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="comments_rate" :value="comment_rate.id" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            {{  comment_rate.rate }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tr-inner-single-box">
                                <div class="tr-single-header">
                                    <h4>Зручності</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="side-list-check">
                                        <li v-for="feature in filterList.features">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="features" :value="feature.id" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            {{  feature.title }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Start Rating -->
                            <div class="tr-inner-single-box">
                                <div class="tr-single-header">
                                    <h4>Кількість зірок (рейтинг помешкання)</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="side-list-check">
                                        <li>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="star_rates" :value="1" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            <div class="search-rating">
                                                <i class="fa fa-star yellow-st"></i>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="star_rates" :value="2" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            <div class="search-rating">
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="star_rates" :value="3" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            <div class="search-rating">
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="star_rates" :value="4" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            <div class="search-rating">
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="star_rates" :value="5" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            <div class="search-rating">
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                                <i class="fa fa-star yellow-st"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tr-inner-single-box">
                                <button @click.prevent="filterRooms()" type="submit" class="btn theme-btn text-center" style="width: 85%;margin-bottom: 20px;margin: 0 auto 10px auto;display: block;">
                                    Відфільтрувати
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- All Item -->
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <div v-for="room in rooms" class="col-md-6 col-sm-6">
                            <RoomCardComponent :room="room"></RoomCardComponent>
                        </div>
                        <div v-if="rooms.length < 1" class="client-info-message text-center">
                            <h3>За Вашим запитом не було знайдено жодних апартаментів</h3>
                            <span>спробуйте зайти пізнаше, або змінити параметри пошуку</span>
                        </div>
                    </div>
                    <div v-if="pagination.last_page > 1" class="row">
                        <ul class="pagination">
                            <li v-if="pagination.current_page !== 1" class="page-item">
                                <a @click.prevent="getRooms(pagination.current_page - 1)" class="page-link" href="#" aria-label="Previous">
                                    <span class="ti-arrow-left"></span>
                                </a>
                            </li>

                            <li v-for="link in pagination.links" :class="link.active ? 'active' : 'page-item'">
                                <template v-if="Number(link.label)">
                                    <a @click.prevent="getRooms(link.label)" class="page-link" href="#">{{  link.label }}</a>
                                </template>
                            </li>

                            <li v-if="pagination.current_page !== pagination.last_page" class="page-item">
                                <a @click.prevent="getRooms(pagination.current_page + 1)" class="page-link" href="#" aria-label="Next">
                                    <span class="ti-arrow-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========== End All Hotel In Grid View =================== -->
</template>

<script>
import RoomCardComponent from "../../components/Room/RoomCardComponent";

export default {
    name: 'Index',

    components: {
        RoomCardComponent,
    },

    mounted() {
        this.getRooms()
        this.getFilterList()
        this.getCities()
    },

    data() {
        return {
            rooms: [],
            filterList: [],
            meals: [],
            leisure_activities: [],
            features: [],
            bed_types: [],
            apartment_types: [],
            distances: [],
            star_rates: [],
            prices: [],
            comments_rate: [],

            pagination: [],
            cities: [],

            // selectedCity: [],
            // check_in: [],
            // check_out: [],
            // members: [],
            booking_city: '',
            booking_members: null,
            booking_check_in: [],
            booking_check_out: [],
        }
    },

    methods: {
        filterRooms() {
            let minPrice = $('.fss-left').text();
            let maxPrice = $('.fss-right').text();
            this.prices = [minPrice, maxPrice];
            this.getRooms();
        },

        getRooms(page = 1) {
            this.axios.post('/api/rooms', {
                'meals': this.meals,
                'leisure_activities': this.leisure_activities,
                'features': this.features,
                'bed_types': this.bed_types,
                'apartment_types': this.apartment_types,
                'distances': this.distances,
                'star_rates': this.star_rates,
                'comments_rate': this.comments_rate,
                'prices': this.prices,
                'page': page,
                'booking_city': this.booking_city,
                'booking_members': this.booking_members,
                'booking_date_range': this.booking_check_in.length > 0 && this.booking_check_out.length > 0 ? this.booking_check_in + ',' + this.booking_check_out : [],
            })
            .then(response => {
                console.log(response);
                this.rooms = response.data.data;
                this.pagination = response.data.meta;
            })
        },

        getFilterList() {
            this.axios.get('/api/rooms/filters')
                .then(response => {
                    this.filterList = response.data;
                    $("#price-range").freshslider({
                        range: true,
                        step: 1,
                        max: this.filterList.price.max,
                        min: this.filterList.price.min,
                        value: [this.filterList.price.min, this.filterList.price.max],
                        onchange: function (low, high) {
                            console.log(low, high);
                        }
                    });
                    console.log(response);
                })
        },

        getCities() {
            this.axios.get('/api/cities')
                .then(response => {
                    this.cities = response.data.data;

                    console.log(this.cities);
                })
        },

        // second advanced method
        // getCities() {
        //     this.axios.post('/api/cities', {
        //         'city': this.city
        //     })
        //         .then(response => {
        //             this.cities = response.data;
        //
        //             console.log(this.cities);
        //         })
        // },
    },
}
</script>

<style scoped>

</style>
