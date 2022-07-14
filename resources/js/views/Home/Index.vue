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
                            <h2>Відкрийте для себе наступну пригоду</h2>
                            <p>Ознайомтеся з найвищими рейтингами готелів по всій Україні</p>
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
                            <h1>Популярні кімнати</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div v-for="room in rooms" class="col-md-4 col-sm-4">
                        <RoomCardComponent :room="room"></RoomCardComponent>
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
                        <ApartmentCardComponent :apartment="apartment"></ApartmentCardComponent>
                    </div>
                </div>

            </div>
        </section>
        <div class="clearfix"></div>

    </div>
</template>

<script>
import RoomCardComponent from "../../components/Room/RoomCardComponent";
import ApartmentCardComponent from "../../components/Apartment/ApartmentCardComponent";

export default {
    name: 'Index',

    components: {
        RoomCardComponent,
        ApartmentCardComponent,
    },

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
