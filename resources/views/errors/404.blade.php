@extends('frontend.master_dashboard')
@section('main')
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="px-3 text-center">
            <h1 class="display-1 font-weight-bold">404</h1>
            <p class="lead">Oops! The page you are looking for cannot be found.</p>
            {{-- <div class="my-4">
                <input type="text" class="form-control" placeholder="Search for content...">
            </div> --}}
            <a href="/" class="btn btn-primary">Go to Homepage</a>
        </div>
    </div>
@endsection
