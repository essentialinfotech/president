@extends('frontend.master_dashboard')

@section('main')
    <section style="margin-top: 110px;">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                        <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab"
                            aria-controls="v-pills-orders" aria-selected="false">Orders</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                        <a class="nav-link" id="v-pills-change-password-tab" data-toggle="pill"
                            href="#v-pills-change-password" role="tab" aria-controls="v-pills-change-password"
                            aria-selected="false">Change Password</a>
                        {{-- <a class="nav-link" id="v-pills-addresses-tab" data-toggle="pill" href="#v-pills-addresses"
                            role="tab" aria-controls="v-pills-addresses" aria-selected="false">Addresses</a> --}}
                        <a class="nav-link" id="v-pills-returns-tab" data-toggle="pill" href="#v-pills-returns"
                            role="tab" aria-controls="v-pills-returns" aria-selected="false">Returns</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Welcome, {{ Auth::user()->name }}!</h4>
                                    <p class="card-text mb-5">Here you can manage your profile and orders.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Orders</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Invoice No</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->invoice_no }}</td>
                                                        <td>{{ $order->invoice_no }}</td>
                                                        <td>{{ $order->status }}</td>
                                                        <td>{{ $order->amount }} BDT</td>
                                                        <td>
                                                            <a href="{{ route('user.order-details', $order->invoice_no) }}"
                                                                class="btn btn-info" title="Details"><i
                                                                    class="fa fa-eye"></i> </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <!-- Add more orders here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Profile</h4>
                                    {{-- Start Alert message --}}
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    {{-- End Alert message --}}
                                    <form action="{{ route('user.update.profile') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                value="{{ Auth::user()->phone }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-change-password" role="tabpanel"
                            aria-labelledby="v-pills-change-password-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Change Password</h4>
                                    {{-- Start Alert message --}}
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    {{-- End Alert message --}}
                                    <form action="{{ route('user.update.password') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="old_password" class="form-label">Old Password</label>
                                            <input type="password" name="old_password" id="old_password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                placeholder="Old Password" />
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">New Password</label>
                                            <input type="password" name="new_password" id="new_password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                placeholder="New Password" />
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_password_confirmation" class="form-label">Confirm New
                                                Password</label>
                                            <input type="password" name="new_password_confirmation"
                                                id="new_password_confirmation"
                                                class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                                placeholder="Confirm New Password" />
                                            @error('new_password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-returns" role="tabpanel"
                            aria-labelledby="v-pills-returns-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Return orders</h4>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Date </th>
                                                    <th>Invoice </th>
                                                    <th>Amount </th>
                                                    <th>Payment </th>
                                                    <th>Status </th>
                                                    <th>Reason </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($return_orders as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }} </td>
                                                        <td>{{ $item->order_date }}</td>
                                                        <td>{{ $item->invoice_no }}</td>
                                                        <td>{{ $item->amount }} BDT</td>
                                                        <td>{{ $item->payment_method }}</td>
                                                        <td>

                                                            @if ($item->return_order == 1)
                                                                <span class="badge rounded-pill bg-danger"> Pending </span>
                                                            @elseif($item->return_order == 2)
                                                                <span class="badge rounded-pill bg-success"> Success
                                                                </span>
                                                            @endif
                                                        </td>

                                                        <td>{{ $item->return_reason }}</td>

                                                        <td>
                                                            <a href="{{ route('user.order-details', $item->invoice_no) }}"
                                                                class="btn btn-info" title="Details"><i
                                                                    class="fa fa-eye"></i> </a>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </section>
@endsection
