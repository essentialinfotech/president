@extends('frontend.master_dashboard')
@section('main')
    <!-- ***** Main Banner Area Start ***** -->
    @include('frontend.home.hero_section')
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Product Area Starts ***** -->
    @include('frontend.home.product_section')
    <!-- ***** Product Area Ends ***** -->

   @include('frontend.home.flow_cart')
   
@endsection
