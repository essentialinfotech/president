@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Gallery</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNew">
                    Add New
                </button>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($item->photo) }}" alt="Product Thambnail"
                                            style="width:40px; height:40px;">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit_{{ $item->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form method="post" action="{{ route('photos.destroy', $item->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm ms-2"
                                                    onClick="return confirm('Are you sure?');"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit_{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Gallery</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('photos.update', $item->id) }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')

                                                        <div class="mb-4">
                                                            <label class="form-label"> Photo *</label>
                                                            <div class=" form-group text-secondary">
                                                                <input type="file" name="photo" class="form-control"
                                                                    onchange="document.getElementById('edit_photo_{{ $item->id }}').src = window.URL.createObjectURL(this.files[0])" />
                                                                @error('photo')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-4">
                                                            <img id="edit_photo_{{ $item->id }}"
                                                                src="/{{ $item->photo }}" alt="photo"
                                                                style="width: 100px;">
                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Photo Alt</label>
                                                            <input type="text" name="photo_alt"
                                                                value="{{ $item->photo_alt }}" class="form-control" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Title</label>
                                                            <input type="text" name="title"
                                                                value="{{ $item->title }}" class="form-control" />
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label"></label>
                                                            <button type="submit" class="btn btn-success">Save
                                                                Changes</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    {{-- Add New Item --}}

    <!-- Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewLabel">Add New</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="myForm" action="{{ route('photos.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        {{-- Start photo --}}
                        <div class="mb-3">
                            <label for="img" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control"
                                onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])" />
                        </div>
                        <div class="mb-3">
                            <img id="photo" src="" alt="" style="width: 100px;">
                        </div>
                        {{-- End photo --}}

                        <div class="mb-3">
                            <label for="img" class="form-label">Photo Alt</label>
                            <input type="text" name="photo_alt" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                },
                messages: {
                    title: {
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
