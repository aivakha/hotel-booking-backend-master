<template>
    <!-- ======================= Start Page Title ===================== -->
    <div class="page-title image-title" style="background-image:url(assets/client/img/tour.jpg);">
        <div class="container">
            <div class="page-title-wrap">
                <h2>Знайдіть Своє Житло</h2>
            </div>
        </div>
    </div>
    <!-- ======================= End Page Title ===================== -->
    <!-- =========== Start All Hotel In Grid View =================== -->
    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <!-- Filter Sidebar -->
                <div class="col-md-4 col-sm-12">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>Search Hotel</h4>
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
                            <h4>Filter</h4>
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
                                        <div id="price-range"></div>
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
                                                <input type="checkbox">
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
                                                <input type="checkbox">
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
                                                <input type="checkbox" v-model="meals" :value="meal.id">
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
                                                <input type="checkbox">
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
                                                <input type="checkbox">
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
                                                <input type="checkbox">
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
                                                <input type="checkbox">
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
                                <button @click.prevent="filterRooms()" type="submit">Відфільтрувати</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- All Item -->
                <div class="col-md-8 col-sm-12">
                    <div class="row">

                        <div v-for="room in rooms" class="col-md-6 col-sm-6">
                            <article class="tour-box style-1">
                                <!-- Single Tour -->
                                <div class="tour-box-image">
                                    <figure>
                                        <a href="tour-detail.html">
                                            <img :src="room.preview_image" class="img-responsive listing-box-img" alt="">
                                            <div class="list-overlay"></div>
                                        </a>
                                        <h4 class="destination-place">
                                            <a href="#">{{ room.title }}</a>
                                        </h4>
                                    </figure>
                                </div>
                                <div class="entry-meta">
                                    <div class="meta-item meta-author">
                                        <div class="coauthors">
                                    <span class="vcard author">
                                    <span class="fn">
                                    <a href="#">
                                        <img alt="" src="assets/client/img/no-user-img.jpg" class="avatar avatar-24" height="24" width="24">
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
                    <div class="row">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span class="ti-arrow-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
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
// import RoomCardComponent from "../../components/Room/RoomCardComponent";

export default {
    name: 'Index',
    // components: {
    //     'RoomCardComponent': RoomCardComponent
    // },

    mounted() {
        this.getRooms()
        this.getFilterList()
    },

    data() {
        return {
            rooms: [],
            filterList: [],
            meals: [],
            prices: [],
        }
    },

    methods: {
        filterRooms() {
            let minPrice = $('.fss-left').text();
            let maxPrice = $('.fss-right').text();
            this.prices = [minPrice, maxPrice];
            console.log(this.meals);

            this.axios.post('/api/rooms', {
                'meals': this.meals,
                'prices': this.prices
            })
                .then(response => {
                    console.log(response);
                    this.rooms = response.data.data;
                })
        },

        getRooms() {
            this.axios.get('/api/rooms')
            .then(response => {
                console.log(response);
                this.rooms = response.data.data;
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
