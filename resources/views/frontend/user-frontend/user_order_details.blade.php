@extends('frontend.master_dashboard')

@section('main')
    <section style="margin-top: 110px;">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills">
                        <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Details <span class="text-success">Invoice: {{ $order->invoice_no }}</span>
                            </h4>
                        </div>
                        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table" style="font-weight: 600;">
                                        <tbody>
                                            <tr>
                                                <td class="col-md-1">
                                                    <label>Image </label>
                                                </td>
                                                <td class="col-md-3">
                                                    <label>Product Name </label>
                                                </td>
                                                <td class="col-md-2">
                                                    <label>Code </label>
                                                </td>
                                                <td class="col-md-1">
                                                    <label>Color </label>
                                                </td>
                                                <td class="col-md-1">
                                                    <label>Quantity </label>
                                                </td>

                                                <td class="col-md-2">
                                                    <label>Price </label>
                                                </td>
                                                <td class="col-md-2">
                                                    <label>Sub Total </label>
                                                </td>

                                            </tr>

                                            @php
                                                $grandTotal = 0;
                                            @endphp
                                            @foreach ($orderItem as $item)
                                                @php
                                                    $totalPrice = $item->price * $item->qty;
                                                    $grandTotal += $totalPrice;
                                                @endphp
                                                <tr>
                                                    <td class="col-md-1">
                                                        <label><img src="{{ asset($item->image) }}"
                                                                style="width:50px; height:50px;">
                                                        </label>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <label>{{ $item->product->product_name }}</label>
                                                    </td>


                                                    <td class="col-md-2">
                                                        <label>{{ $item->product->product_code }} </label>
                                                    </td>
                                                    @if ($item->color == null)
                                                        <td class="col-md-1">
                                                            <label>.... </label>
                                                        </td>
                                                    @else
                                                        <td class="col-md-1">
                                                            <label>{{ $item->color }} </label>
                                                        </td>
                                                    @endif

                                                    <td class="col-md-1">
                                                        <label>{{ $item->qty }} </label>
                                                    </td>

                                                    <td class="col-md-2">
                                                        <label>{{ $item->price }} BDT
                                                        </label>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <label>
                                                            {{ $item->price * $item->qty }}
                                                            BDT
                                                        </label>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="6" class="text-right"><strong>Grand Total:</strong></td>
                                                <td>{{ $grandTotal }} BDT</td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>






    </section>
@endsection
