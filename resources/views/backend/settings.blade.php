@extends('admin.admin_dashboard')


@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Settings</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Settings</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Settings</h5>
                <hr />
                <form id="myForm" action="{{ route('admin.setting-update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Start logo --}}
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Logo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" name="logo" class="form-control"
                                onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])" />
                            @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <img id="logo" src="{{ asset($setting->logo) }}" alt="logo" style="width: 100px;">
                        </div>
                    </div>
                    {{-- End logo --}}

                    {{-- Start Footer logo --}}
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Footer Logo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" name="footer_logo" class="form-control"
                                onchange="document.getElementById('footer_logo').src = window.URL.createObjectURL(this.files[0])" />
                            @error('footer_logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <img id="footer_logo" src="{{ asset($setting->footer_logo) }}" alt="footer_logo"
                                style="width: 100px;">
                        </div>
                    </div>
                    {{-- End Footer logo --}}

                    {{-- Start favicon --}}
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Favicon</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" name="favicon" class="form-control"
                                onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])" />
                            @error('favicon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <img id="favicon" src="{{ asset($setting->favicon) }}" alt="favicon" style="width: 100px;">
                        </div>
                    </div>
                    {{-- End favicon --}}


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Title</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ $setting->title }}" />
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <h5>US Address and Phone numbers:</h5>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="us_address"
                                class="form-control @error('us_address') is-invalid @enderror"
                                value="{{ $setting->us_address }}" />
                            @error('us_address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone 1</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="us_phone_1"
                                class="form-control @error('us_phone_1') is-invalid @enderror"
                                value="{{ $setting->us_phone_1 }}" />
                            @error('us_phone_1')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone 2 (Optional)</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="us_phone_2"
                                class="form-control @error('us_phone_2') is-invalid @enderror"
                                value="{{ $setting->us_phone_2 }}" />
                            @error('us_phone_2')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <h5>Bangladesh Address and Phone numbers:</h5>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                value="{{ $setting->address }}" />
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone 1</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="phone_1" class="form-control @error('phone_1') is-invalid @enderror"
                                value="{{ $setting->phone_1 }}" />
                            @error('phone_1')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone 2 (Optional)</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="phone_2" class="form-control @error('phone_2') is-invalid @enderror"
                                value="{{ $setting->phone_2 }}" />
                            @error('phone_2')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ $setting->email }}" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Map Link</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="map_link"
                                class="form-control @error('map_link') is-invalid @enderror"
                                value="{{ $setting->map_link }}" />
                            @error('map_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Meta Keywards</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="meta_keyword" class="form-control"
                                value="{{ $setting->meta_keyword }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Meta Description</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="meta_description" class="form-control"
                                value="{{ $setting->meta_description }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Footer Text</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <textarea class="form-control @error('footer_text') is-invalid @enderror" name="footer_text" id="">{{ $setting->footer_text }}</textarea>
                            @error('footer_text')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Footer Copyright By</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="footer_copyright_by"
                                class="form-control @error('footer_copyright_by') is-invalid @enderror"
                                value="{{ $setting->footer_copyright_by }}" />
                            @error('footer_copyright_by')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Footer Copyright Url</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="footer_copyright_url"
                                class="form-control @error('footer_copyright_url') is-invalid @enderror"
                                value="{{ $setting->footer_copyright_url }}" />
                            @error('footer_copyright_url')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    footer_text: {
                        required: true,
                    },
                },
                messages: {
                    footer_text: {
                        required: 'Please Enter footer Text',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
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
@endsection
