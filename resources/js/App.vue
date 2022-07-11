<template>
    <div>
        <nav class="navbar navbar-default navbar-mobile navbar-fixed white no-background bootsnav">
            <div class="container">

                <!-- Start Logo Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index-2.html">
                        <img src="src/assets/img/logo-light.png" class="logo logo-display" alt="">
                        <img src="src/assets/img/logo.png" class="logo logo-scrolled" alt="">
                    </a>

                </div>
                <!-- End Logo Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                        <li><router-link to="/">Home</router-link></li>
                        <li><router-link to="/rooms">Rooms</router-link></li>
                        <li><router-link to="/">Find Hotel</router-link></li>
                        <li><router-link to="/">Cart</router-link></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="br-right"><a href="javascript:void(0)"  data-toggle="modal" data-target="#signin"><i class="login-icon ti-user"></i>Login</a></li>
                        <li class="sign-up"><a class="btn-signup red-btn" href="tour-grid-sidebar.html"><span class="ti-briefcase"></span>Booking Hotel</a></li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>

        <router-view></router-view>

        <footer class="footer dark-bg">
            <div class="container">

                <!-- Row Start -->
                <div class="row">

                    <div class="col-md-8 col-sm-8">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <h4>Featured Destinations</h4>
                                <ul>
                                    <li><a href="destination-grid.html">Destination Grid</a></li>
                                    <li><a href="destination-list.html">Destination List</a></li>
                                    <li><a href="destination-grid-sidebar.html">Destination Grid Sidebar</a></li>
                                    <li><a href="destination-list-sidebar.html">Destination List Sidebar</a></li>
                                    <li><a href="destination-detail.html">Destination Detail</a></li>
                                    <li><a href="restaurant-grid.html">Restaurant Grid</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h4>Featured Tours</h4>
                                <ul>
                                    <li><a href="tour-grid.html">Tour Grid</a></li>
                                    <li><a href="tour-list.html">Tour List</a></li>
                                    <li><a href="tour-grid-sidebar.html">Tour Grid Sidebar</a></li>
                                    <li><a href="tour-list-sidebar.html">tour List Sidebar</a></li>
                                    <li><a href="tour-detail.html">Tour Detail</a></li>
                                    <li><a href="http://themezhub.com/">Restaurant Grid</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h4>Featured Hotels</h4>
                                <ul>
                                    <li><a href="hotel-grid.html">Hotel Grid</a></li>
                                    <li><a href="hotel-list.html">Hotel List</a></li>
                                    <li><a href="hotel-grid-sidebar.html">Hotel Grid Sidebar</a></li>
                                    <li><a href="hotel-list-sidebar.html">Hotel List Sidebar</a></li>
                                    <li><a href="hotel-detail.html">Hotel Detail</a></li>
                                    <li><a href="restaurant-detail.html">Restaurant Detail</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <h4>Subscribe Now</h4>
                        <!-- Newsletter -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Email">
                            <span class="input-group-btn">
								<button type="button" class="btn btn-default"><i class="fa fa-location-arrow font-20"></i></button>
							</span>
                        </div>

                        <!-- Social Box -->
                        <div class="f-social-box">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook facebook-cl"></i></a></li>
                                <li><a href="#"><i class="fa fa-google google-plus-cl"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter twitter-cl"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest pinterest-cl"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram instagram-cl"></i></a></li>
                            </ul>
                        </div>

                        <!-- App Links -->
                        <div class="f-app-box">
                            <ul>
                                <li><a href="#"><i class="fa fa-apple"></i>App Store</a></li>
                                <li><a href="#"><i class="fa fa-android"></i>Play Store</a></li>
                            </ul>
                        </div>

                    </div>

                </div>

                <!-- Row Start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright text-center">
                            <p>Copyright @2022</p>
                        </div>
                    </div>
                </div>

            </div>
        </footer>
    </div>
</template>

<script>
export default {
    name: 'App',
    mounted() {
        $(document).trigger('change')
    }
}
</script>

<style>

</style>
