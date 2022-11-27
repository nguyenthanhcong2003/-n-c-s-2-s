@extends('front.layout.master')

@section('title')
    my-order detail
@endsection

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>My Order Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- My order Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                OrderId:
                                <b>#{{ $order->id }}</b>
                            </a>
                        </div>
                        <h4>Biiling Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name</label>
                                <input disabled type="text" name="" id="fir" value="{{ $order->first_name }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name</label>
                                <input disabled type="text" name="" id="last" value="{{ $order->last_name }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                                <input disabled type="text" name="" id="cun-name" value="{{ $order->company_name }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country</label>
                                <input disabled type="text" name="" id="cun" value="{{ $order->country }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address</label>
                                <input disabled type="text" id="street" class="street-first"  value="{{ $order->street_address }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP (optional)</label>
                                <input disabled type="text" id="zip" name="" value="{{ $order->postcode_zip }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City</label>
                                <input disabled type="text" id="town" name="" value="{{ $order->town_city }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address</label>
                                <input disabled type="text" id="email" name="" value="{{ $order->email }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone</label>
                                <input disabled type="text" id="phone" name="" value="{{ $order->phone  }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                Status:
                                <b>{{ \App\Utilities\Constant::$order_status[$order->status] }}</b>
                            </a>
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @foreach($order->orderDetails as $orderDetail)
                                        <li class="fw-normal">
                                            {{ $orderDetail->product->name }} x {{ $orderDetail->qty }}
                                            <span>${{ $orderDetail->total }}</span></li>
                                    @endforeach
                                    <li class="total-price">Total
                                        <span>
                                      ${{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}
                                    </span>
                                    </li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Pay later
                                            <input disabled type="radio" name="payment_type" value="pay_later" id="pc-check"
                                                {{ $order->payment_type == 'pay_later' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Online payment
                                            <input disabled type="radio" name="payment_type" value="online_payment" id="pc-paypal"
                                                {{ $order->payment_type == 'online_payment' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- My order Section End -->

@endsection
