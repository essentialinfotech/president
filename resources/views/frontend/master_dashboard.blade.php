<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>{{ $global_setting_data->title }}</title>
    <link rel="shortcut icon" href="/{{ $global_setting_data->favicon }}" type="image/x-icon" />


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightbox.css') }}">
    <!-- Toast -->
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/iziToast.min.css') }}"> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
    <!-- Toast -->
    {{-- <script src="{{ asset('frontend/js/iziToast.min.js') }}"></script> --}}
    {{-- For cart page slider --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">

</head>



<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    @include('frontend.body.header')
    @include('frontend.body.chat')
    <!-- ***** Header Area End ***** -->

    @yield('main')


    <!-- ***** Footer Start ***** -->
    @include('frontend.body.footer')



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- <script src="{{ asset('frontend/assets/js/jquery-2.1.0.min.js') }}"></script> --}}
    <!-- Bootstrap -->
    <script src="{{ asset('frontend/assets/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/accordions.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollreveal.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/filter.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/quantity.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('frontend/assets/js/cart.js') }}"></script>
    {{-- For cart page slider --}}
    <script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>


    <script src="{{ asset('adminbackend/assets/js/validate.min.js') }}"></script>
    {{-- Custom js --}}
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>






    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.error({
                    title: 'Error',
                    position: 'topRight',
                    message: '{{ $error }}',
                });
            </script>
        @endforeach
    @endif

    @if (session()->get('error'))
        <script>
            iziToast.error({
                title: 'Error',
                message: '{{ session()->get('error') }}',
            });
        </script>
    @endif
    @if (session()->get('success'))
        <script>
            iziToast.success({
                position: 'topRight',
                message: '{{ session()->get('success') }}',
            });
        </script>
    @endif
    @stack('script')
</body>

</html>
