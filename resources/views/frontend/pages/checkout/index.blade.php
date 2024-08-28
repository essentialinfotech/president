@extends('frontend.master_dashboard')

@section('main')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-check-label {
            margin-left: 5px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .btn-primary,
        .btn-success {
            width: 100%;
            margin-top: 20px;
        }

        .checkout_page .breadcrumb {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: start;
            background: transparent;
            padding-left: 0;
        }

        .checkout_page .breadcrumb i {
            padding: 0 10px;
        }

        .checkout_page .breadcrumb li a {
            color: #0d0d0d;
        }

        .checkout_page .confirm_info {
            margin-bottom: 20px;
        }

        .checkout_page .confirm_info .wrap {
            display: flex;
            flex-direction: row;
            align-items: center;
            border: 1px solid #e0e0e0;
            padding: 10px 20px;
            width: 100%;
            justify-content: space-between;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .checkout_page .confirm_info .wrap .com {
            display: flex;
            flex-direction: row;
            align-items: center;

        }

        .checkout_page .confirm_info .discount input {
            border: none;
            background: transparent;
            width: 100%;
        }

        .checkout-summary {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
        }

        .checkout-summary h5 {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 20px;
        }

        .checkout-summary span {
            font-size: 15px;
        }

        .checkout-summary .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .checkout_page .delivery_info {
            border: 1px solid #e0e0e0;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .checkout_page .delivery_info h4 {
            font-size: 18px;
            margin-bottom: 50px;
        }

        .checkout_page .delivery_info .form-group {
            margin-bottom: 30px;
        }

        .checkout_page .delivery_info .form-group select {
            border-radius: 10px;
        }

        .checkout_page .delivery_info .form-group input {
            border-radius: 10px;
        }

        .checkout_page .confirm_info {
            border: 1px solid #e0e0e0;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
    <section style="margin-top: 110px;">
        <div class="checkout_page">
            <div class="back_bar">
                <a href="{{ url()->previous() }}">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <p>Home Page</p>
                </a>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('checkout.process') }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul class="breadcrumb">
                                <li><a href="#">Address</a></li>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <li><a href="#">Shipping</a></li>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <li>Payment</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="delivery_info">
                                <h4>Delivery Informtaion</h4>
                                <div class="form-group">
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" name="name" placeholder="Recipient Full Name*">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control  @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" name="phone" placeholder="Recipient Phone Number*">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" name="email" placeholder="Recipient Email*">
                                </div>

                                <div class="form-group">
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                                        placeholder="Address*">{{ old('address') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="post_code"
                                        class="form-control @error('post_code') is-invalid @enderror"
                                        value="{{ old('post_code') }}" placeholder="Post Code*">
                                </div>
                                <div class="form-group">
                                    <textarea name="notes" class="form-control" value="{{ old('notes') }}" placeholder="Notes"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="confirm_info">

                                <div class="form-group">
                                    <select class="form-control @error('payment_method') is-invalid @enderror"
                                        name="payment_method" id="paymentMethod">
                                        <option selected disabled>-- Select Payment Method --</option>
                                        <option value="Cash On Delivery">Cash on Delivery</option>
                                        <option value="bKash">Bkash</option>
                                        <option value="Rocket">Rocket</option>
                                        <option value="Nagad">Nagad</option>
                                    </select>
                                    @error('payment_method')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @error('sender_phone_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @error('transaction_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="card-info">
                                    <div class="row gy-3">

                                        <div class="col-md-6">
                                            <label for="sender_phone_number" class="form-label">Sender Phone
                                                Number</label>
                                            <input type="text" name="sender_phone_number"
                                                class="form-control @error('sender_phone_number') is-invalid @enderror"
                                                id="sender_phone_number" placeholder="">
                                            <div class="invalid-feedback">
                                                Sender number is required.
                                            </div>
                                            @error('sender_phone_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="transaction_id" class="form-label">Trx ID</label>
                                            <input type="text" name="transaction_id"
                                                class="form-control @error('transaction_id') is-invalid @enderror"
                                                id="transaction_id" placeholder="">
                                            <div class="invalid-feedback">
                                                TRX ID is required.
                                            </div>
                                            @error('transaction_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Send To (AGENT)</label>
                                            <input type="text" class="form-control" disabled
                                                placeholder="+880 1857670998">
                                            <div class="invalid-feedback">
                                                Expiration date required.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            @if (session('cart'))
                                @php
                                    $totalQuantity = 0;
                                    $totalSellingPrice = 0;
                                    $totalDiscount = 0;

                                    foreach (session()->get('cart', []) as $details) {
                                        $quantity = $details['variant']['variant_size']['qty'];
                                        $sellingPrice = $details['variant']['variant_size']['selling_price'];
                                        $discountPrice = $details['variant']['variant_size']['discount_price'] ?? null;

                                        // Calculate total selling price (without discount)
                                        $totalSellingPrice += $sellingPrice * $quantity;

                                        // Calculate discount only if there is a discount price
                                        if ($discountPrice !== null) {
                                            $totalDiscount += ($sellingPrice - $discountPrice) * $quantity;
                                        }

                                        $totalQuantity += $quantity;
                                    }

                                    // Final product price after applying the discount
                                    $totalProductPrice = $totalSellingPrice - $totalDiscount;
                                @endphp
                            @endif
                            <div class="checkout-summary">
                                <h5>Checkout Summary</h5>
                                <div class="summary-row mb-0">
                                    <span>Original Product Price</span>
                                    <span>{{ number_format($totalSellingPrice, 2) }} BDT</span>
                                </div>
                                <div class="summary-row">
                                    <span class="text-muted" style="font-size: 12px;">({{ $totalQuantity }}
                                        Items)</span>
                                </div>
                                @if ($totalDiscount > 0)
                                    <div class="summary-row">
                                        <span>Product Discount</span>
                                        <span>- {{ number_format($totalDiscount, 2) }} BDT</span>
                                    </div>
                                @endif
                                <div class="summary-row">
                                    <span>Total Product Price</span>
                                    <span>{{ number_format($totalProductPrice, 2) }} BDT</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Order Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
