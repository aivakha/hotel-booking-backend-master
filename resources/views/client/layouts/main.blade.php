<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tour & Travel Bootstrap Template </title>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/plugins/css/plugins.css') }}">

    <!-- Custom style -->
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/responsiveness.css') }}" rel="stylesheet">
    <link id="jssDefault" rel="stylesheet" href="{{ asset('assets/client/css/skins/default.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

    <div id="app">
        @yield('content')
    </div>

    <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="myModalLabel1">
                <div class="modal-body">
                    <div class="text-center"><img src="{{ asset('assets/client/img/logo.png') }}" class="img-responsive"
                                                  alt=""></div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="tab" href="#employer" role="tab">
                                <i class="ti-user"></i> Employer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#candidate" role="tab">
                                <i class="ti-user"></i> Candidate</a>
                        </li>
                    </ul>
                    <!-- Nav tabs -->

                    <!-- Tab panels -->
                    <div class="tab-content">

                        <!-- Employer Panel 1-->
                        <div class="tab-pane fade in show active" id="employer" role="tabpanel">
                            <form>

                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" placeholder="User Name">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="*********">
                                </div>

                                <div class="form-group">
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="4">
                                                    <label for="4"></label>Remember me
                                                </span>
                                    <a href="#" title="Forget" class="fl-right">Forgot Password?</a>
                                </div>
                                <div class="form-group text-center">
                                    <button type="button" class="btn theme-btn full-width btn-m">LogIn</button>
                                </div>

                            </form>

                            <div class="log-option"><span>OR</span></div>

                            <div class="row mrg-bot-20">
                                <div class="col-md-6">
                                    <a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i>
                                        Sign In With Facebook
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google-plus"></i>
                                        Sign In With Google+
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!--/.Panel 1-->

                        <!-- Candidate Panel 2-->
                        <div class="tab-pane fade" id="candidate" role="tabpanel">
                            <form>

                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" placeholder="User Name">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="*********">
                                </div>

                                <div class="form-group">
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="4">
                                                    <label for="4"></label>Remember me
                                                </span>
                                    <a href="#" title="Forget" class="fl-right">Forgot Password?</a>
                                </div>
                                <div class="form-group text-center">
                                    <button type="button" class="btn theme-btn full-width btn-m">LogIn</button>
                                </div>

                            </form>

                            <div class="log-option"><span>OR</span></div>

                            <div class="row mrg-bot-20">
                                <div class="col-md-6">
                                    <a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i>
                                        Sign In With Facebook
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google-plus"></i>
                                        Sign In With Google+
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!--/.Panel 2-->

                    </div>
                    <!-- Tab panels -->
                </div>
            </div>
        </div>
    </div>

<!-- =================== START JAVASCRIPT ================== -->
<script src="{{ asset('assets/client/plugins/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/viewportchecker.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/bootsnav.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/jquery.downCount.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/freshslider.1.0.0.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/bootstrap-wysihtml5.js') }}"></script>

<!-- Dashboard Js -->
<script src="{{ asset('assets/client/plugins/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/client/plugins/js/jquery.easing.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('assets/client/js/custom.js') }}"></script>

<script src="{{ asset('assets/client/js/jQuery.style.switcher.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
