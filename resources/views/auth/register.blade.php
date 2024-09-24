@extends('frontend.master_dashboard')

@section('main')
    <section style="margin-top: 100px;">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class=" mt-5">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Register</h3>
                                </div>
                                <div class="form-body">

                                    <form id="myForm" method="POST" action="#">
                                        @csrf

                                        <!-- Name -->
                                        <div>
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" class="form-control" type="text" name="name"
                                                :value="old('name')" required autofocus autocomplete="name"
                                                placeholder="Your Full Name" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mt-2">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control" type="email" name="email"
                                                :value="old('email')" required autocomplete="email" placeholder="Your Email" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-2">
                                            <x-input-label for="password" :value="__('Password')" />

                                            {{-- <x-text-input id="password" class="form-control" type="password"
                                                name="password" required autocomplete="new-password" /> --}}
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" class="form-control border-end-0"
                                                    id="inputChoosePassword" placeholder="Password">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class='fas fa-eye'></i></a>
                                            </div>

                                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-2">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-text-input id="password_confirmation" class="form-control" type="password"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Confirm Password" />

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> <a href="{{ route('login') }}"
                                                    class="text-muted">{{ __('Already registered?') }}</a>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">


                                            <Button type="submit" class="btn btn-dark">Register</Button>
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

@push('script')
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },

                },
                messages: {
                    email: {
                        required: 'The email field is required.',
                    },
                    password: {
                        required: 'The password field is required.',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.after(error); // Place the error message directly after the input field
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endpush
