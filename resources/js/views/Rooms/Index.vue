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
                                            <input type="text" class="form-control" placeholder="Location..">
                                        </div>
                                        <div class="sidebar-input">
                                            <input class="form-control JS--date-input" type="text"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')"
                                                   placeholder="Check In">
                                        </div>
                                        <div class="sidebar-input">
                                            <input class="form-control JS--date-input" type="text"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')"
                                                   placeholder="Check Out">
                                        </div>
                                        <button class="form-control" style="background-color: #ff4e00; color: #FFF"
                                                type="submit">Submit
                                        </button>
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
                                    <h4>Ціна</h4>
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
                                    <h4>Тип помешкання</h4>
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
                                    <h4>Активності</h4>
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

                            <!-- Distance to center -->
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
                                    <h4>Рейтинг помешкання</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="side-list-check">
                                        <li v-for="star_rate in filterList.star_rates">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" v-model="star_rates" :value="star_rate.star_rate" v-on:change="filterRooms()">
                                                <label></label>
                                            </span>
                                            <div class="search-rating">
                                                <i v-for="n in star_rate.star_rate" class="fa fa-star yellow-st"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tr-inner-single-box">
                                <button @click.prevent="filterRooms()" type="submit" class="btn theme-btn text-center" style="width: 85%; margin-bottom: 20px">Відфільтрувати</button>
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
    },

    data() {
        return {
            rooms: [],
            filterList: [],
            meals: [],
            leisure_activities: [],
            features: [], // working
            bed_types: [], // working
            apartment_types: [], // working
            distances: [], // working
            star_rates: [], // working
            prices: [], // working

            pagination: [],
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
                'prices': this.prices,
                'page': page
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
                    //this.rooms = response.data.data;
                })
        }
    },
}
</script>

<style scoped>

</style>
