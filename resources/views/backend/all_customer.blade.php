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
                        <li class="breadcrumb-item active" aria-current="page">Customer List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Customer List</h5>
                <hr />
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>S.L</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>#{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $customer->name }}
                                    </td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }} </td>
                                    <td>{{ $customer->address }} </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
