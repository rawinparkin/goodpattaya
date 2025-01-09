<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="description" content="ขายบ้าน ให้เช่าบ้าน พัทยา คอนโด อาคาร ที่ดิน">
    <meta name="keywords" content="ขายบ้าน, ให้เช่าบ้าน, พัทยา, อสังหาริมทรัพย์">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @yield('meta')

    <!--favicon-->
    <link rel="icon" href="{{ asset('logo/home.svg') }}" type="image/png" />


    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fl-bigmug-line.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

</head>

<body>

    <div class="site-loader"></div>









    @include('frontend.body.header')
    <!-- END nav -->

    <main>
        @yield('main')
    </main>

    @include('frontend.body.footer')

    </div>

    <script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->

    @if(Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    </script>
    @endif

    <!--Validate-->
    <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

</body>

</html>