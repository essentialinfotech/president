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
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/iziToast.min.css') }}">

    {{-- For cart page slider --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">

    <style>
        .alert {
            width: fit-content;
            position: absolute;
            top: 60px;
            right: 0;
            transition: 3s;
            z-index: 999;
        }
    </style>

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
    <!-- Toast -->
    <script src="{{ asset('frontend/assets/js/iziToast.min.js') }}"></script>
    <!-- Global Init -->
    <script src="{{ asset('frontend/assets/js/cart.js') }}"></script>
    {{-- For cart page slider --}}
    <script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>


    <script src="{{ asset('adminbackend/assets/js/validate.min.js') }}"></script>
    {{-- Custom js --}}
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 2000); // 10000 milliseconds = 10 seconds
            }
        });
    </script>



    <script>
        let currentPage = 1; // Start with the first page
        const productsPerPage = 12; // Number of products per page

        $(document).on('click', '#loadMore', function() {
            currentPage++; // Increment the page number
            $.ajax({
                url: '{{ route('load.more.products') }}', // Adjust the route to match your web.php
                method: 'GET',
                data: {
                    page: currentPage,
                    per_page: productsPerPage
                },
                success: function(response) {
                    // Convert the HTML string into jQuery elements
                    const newProducts = $(response.html);

                    // Hide the new products initially
                    newProducts.hide();

                    // Append them to the container
                    $('#products').append(newProducts);

                    // Fade in the new products smoothly
                    newProducts.fadeIn(600);

                    // Remove the "Show More" button if there are no more products to load
                    if (response.remaining <= 0) {
                        $('#loadMore').remove();
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText); // Log any error messages for debugging
                }
            });
        });
    </script>

    @stack('script')
</body>

</html>
