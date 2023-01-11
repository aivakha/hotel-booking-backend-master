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
                        <li><router-link :to="{name: 'home'}">Головна</router-link></li>
                        <li><router-link :to="{name: 'rooms'}">Пошук житла</router-link></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="br-right">
                            <a href="/login">
                                <i class="login-icon ti-user"></i>
                                Обліковий запис
                            </a>
                        </li>

                        <li class="br-right">
                            <router-link :to="{name: 'rooms'}" class="btn-signup red-btn">
                                <i class="login-icon ti-user"></i>
                                Забронювати
                            </router-link>
                        </li>

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
                                <h4>Найкращі апартаменти</h4>
                                <ul>
                                    <li><a href="hotel-grid.html">Апартамент 1</a></li>
                                    <li><a href="hotel-grid.html">Апартамент 2</a></li>
                                    <li><a href="hotel-grid.html">Апартамент 3</a></li>
                                    <li><a href="hotel-grid.html">Апартамент 4</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h4>Найкращі кімнати</h4>
                                <ul>
                                    <li><a href="tour-grid.html">Кімната 1</a></li>
                                    <li><a href="tour-grid.html">Кімната 2</a></li>
                                    <li><a href="tour-grid.html">Кімната 3</a></li>
                                    <li><a href="tour-grid.html">Кімната 4</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h4>Найкращі апартаменти</h4>
                                <ul>
                                    <li><a href="hotel-grid.html">Апартамент 1</a></li>
                                    <li><a href="hotel-grid.html">Апартамент 2</a></li>
                                    <li><a href="hotel-grid.html">Апартамент 3</a></li>
                                    <li><a href="hotel-grid.html">Апартамент 4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <h4>Підписка</h4>
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
    data() {
        return {

        }
    },
}
</script>

<style>

</style>
