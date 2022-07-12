<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Falcon | Dashboard &amp; Web App Template</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/admin/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/admin/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/admin/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/admin/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/admin/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">

    {{--vendors css--}}
    <link href="{{ asset('assets/admin/vendors/choices/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('assets/admin/vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">--}}
    {{--    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />--}}
    <link href="{{ asset('assets/admin/vendors/prism/prism-okaidia.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/glightbox/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/admin/css/theme-rtl.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/admin/css/theme.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/admin/css/user-rtl.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/admin/css/user.css') }}" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>
<body>

<main class="main" id="top">
    <div class="container" data-layout="container">
        <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
                var container = document.querySelector('[data-layout]');
                container.classList.remove('container');
                container.classList.add('container-fluid');
            }
        </script>

        @yield('content')

    </div>
</main>

<script src="{{ asset('assets/admin/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/is/is.min.js') }}"></script>

<script src="{{ asset('assets/admin/vendors/countup/countUp.umd.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/choices/choices.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/flatpickr.js') }}"></script>
{{--<script src="{{ asset('assets/admin/vendors/dropzone/dropzone.min.js') }}"></script>--}}
{{--<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>--}}
<script src="{{ asset('assets/admin/vendors/rater-js/index.js') }}"> </script>

<script src="{{ asset('assets/admin/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/prism/prism.js') }}"></script>

<script src="{{ asset('assets/admin/vendors/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/flatpickr.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/list.js/list.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/glightbox/glightbox.min.js') }}"></script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{ asset('assets/admin/js/admin.js') }}"></script>

</body>

