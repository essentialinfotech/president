@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Support Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Support Section</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Support Section</h5>
                <hr />
                <form id="myForm" action="{{ route('admin.support-section-update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Start Banner Image --}}
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Banner Image</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" name="support_banner_img" class="form-control"
                                onchange="document.getElementById('support_banner_img').src = window.URL.createObjectURL(this.files[0])" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <img id="support_banner_img" src="{{ asset($support->support_banner_img) }}"
                                alt="support_banner_img" style="width: 100px;">
                        </div>
                    </div>
                    {{-- End Banner Image --}}
                    <div class="mb-3">
                        <label for="img" class="form-label">Banner Alt</label>
                        <input type="text" name="support_banner_alt"
                            value="{{ $support->support_banner_alt }}" class="form-control" />
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Title</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="support_title" class="form-control"
                                value="{{ $support->support_title }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Description</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <textarea class="form-control" name="support_description" id="">{{ $support->support_description }}</textarea>
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
                    support_title: {
                        required: true,
                    },
                },
                messages: {
                    support_title: {
                        required: 'Please Enter Title',
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
