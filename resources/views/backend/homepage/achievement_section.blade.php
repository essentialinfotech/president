@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Achievement Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Achievement Section</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Achievement Section</h5>
                <hr />
                <form id="myForm" action="{{ route('admin.achievement-section-update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Title</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="achievement_title" class="form-control"
                                value="{{ $achievement->achievement_title }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Description</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <textarea class="form-control" name="achievement_description" id="">{{ $achievement->achievement_description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Project Delivered</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="number" min="1" name="achievement_project" class="form-control"
                                value="{{ $achievement->achievement_project }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Award Won</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="number" min="1" name="achievement_award" class="form-control"
                                value="{{ $achievement->achievement_award }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Happy Client</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="number" min="1" name="achievement_client" class="form-control"
                                value="{{ $achievement->achievement_client }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Employee Working</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="number" min="1" name="achievement_employee" class="form-control"
                                value="{{ $achievement->achievement_employee }}" />
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
                    achievement_title: {
                        required: true,
                    },
                    achievement_project: {
                        required: true,
                    },
                    achievement_award: {
                        required: true,
                    },
                    achievement_client: {
                        required: true,
                    },
                    achievement_employee: {
                        required: true,
                    },
                },
                messages: {
                    achievement_title: {
                        required: 'Please Enter Title',
                    },
                    achievement_project: {
                        required: 'Please Enter Project Delevered Number',
                    },
                    achievement_award: {
                        required: 'Please Enter Award Won Number',
                    },
                    achievement_client: {
                        required: 'Please Enter Happy Client Number',
                    },
                    achievement_employee: {
                        required: 'Please Enter Working Employee Number',
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
