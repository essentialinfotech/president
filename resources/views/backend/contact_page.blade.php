@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Contact Page Content</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Contact Page Content</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Contact Page Content</h5>
                <hr />
                <form id="myForm" action="{{ route('admin.contact-page-update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Start Banner Image --}}
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Banner (Min Width: 1400px & Min Height: 332px)</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" name="contact_banner" class="form-control"
                                onchange="document.getElementById('contact_banner').src = window.URL.createObjectURL(this.files[0])" />
                            @error('contact_banner')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <img id="contact_banner" src="{{ asset($page_data->contact_banner) }}" alt="contact_banner"
                                style="width: 100px;">
                        </div>
                    </div>
                    {{-- End Banner Image --}}

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Heading</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="contact_heading" class="form-control"
                                value="{{ $page_data->contact_heading }}" />
                            @error('contact_heading')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Short Description</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <textarea class="form-control" name="contact_short_description" id="">{{ $page_data->contact_short_description }}</textarea>
                            @error('contact_short_description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Embed a map</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <textarea class="form-control" name="contact_map" id="">{{ $page_data->contact_map }}</textarea>
                            @error('contact_map')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">SEO Title</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="contact_seo_title" class="form-control"
                                value="{{ $page_data->contact_seo_title }}" />
                            @error('contact_seo_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Meta Description</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <textarea class="form-control" name="contact_seo_meta_description" id="">{{ $page_data->contact_seo_meta_description }}</textarea>
                            @error('contact_seo_meta_description')
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
                    contact_heading: {
                        required: true,
                    },
                },
                messages: {
                    contact_heading: {
                        required: 'Please Enter Heading',
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
