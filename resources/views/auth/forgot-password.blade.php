{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('frontend.master_dashboard')

@section('main')
    <section style="margin-top: 100px;">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mt-5">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4 text-success" :status="session('status')" />
                                <form id="myForm" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="col-12">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="form-control block mt-1 w-full" type="email"
                                            name="email" :value="old('email')" required autofocus />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-dark"><i
                                                    class="bx bxs-lock-open"></i>Email
                                                Password Reset Link</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
        </div>

    </section>
@endsection
