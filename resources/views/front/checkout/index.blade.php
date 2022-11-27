@extends('front.layout.master')

@section('title')
    check out
@endsection

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="" method="post" class="checkout-form">
                @csrf
                <div class="row">
                    @if(Cart::count() > 0)
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <a href="#" class="content-btn">Click Here To Login</a>
                            </div>
                            <h4>Biiling Details</h4>
                            <div class="row">
                                <input type="hidden" name="user_id" id="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? '' }}">
                                <div class="col-lg-6">
                                    <label for="fir">First Name<span>*</span></label>
                                    <input type="text" id="fir" name="first_name">
                                    @error('first_name')
                                        <div class="text-danger" style="margin-top: -20px; margin-bottom: 10px; margin-left: 7px">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="last">Last Name<span>*</span></label>
                                    <input type="text" id="last" name="last_name">
                                    @error('last_name')
                                        <div class="text-danger" style="margin-top: -20px; margin-bottom: 10px; margin-left: 7px">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun-name">Company Name</label>
                                    <input type="text" id="cun-name" name="company_name" value="{{ \Illuminate\Support\Facades\Auth::user()->company_name ?? '' }}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun">Country<span>*</span></label>
                                    <input type="text" id="cun" name="country" value="{{ \Illuminate\Support\Facades\Auth::user()->country ?? '' }}">
                                    @error('country')
                                        <div class="text-danger" style="margin-top: -20px; margin-bottom: 10px; margin-left: 7px"">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label for="street">Street Address<span>*</span></label>
                                    <input type="text" id="street" class="street-first" name="street_address" value="{{ \Illuminate\Support\Facades\Auth::user()->street_address ?? '' }}">
                                    @error('street_address')
                                        <div class="text-danger" style="margin-top: -20px; margin-bottom: 10px; margin-left: 7px">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label for="zip">Postcode / ZIP (optional)<span>*</span></label>
                                    <input type="text" id="zip" name="postcode_zip" value="{{ \Illuminate\Support\Facades\Auth::user()->postcode_zip ?? '' }}">
                                    @error('postcode_zip')
                                        <div class="text-danger" style="margin-top: -20px; margin-bottom: 10px; margin-left: 7px">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label for="town">Town / City<span>*</span></label>
                                    <input type="text" id="town" name="town_city" value="{{ \Illuminate\Support\Facades\Auth::user()->town_city ?? '' }}">
                                    @error('town_city')
                                    <div class="text-danger" style="margin-top: -20px; margin-bottom: 10px; margin-left: 7px">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Email Address<span>*</span></label>
                                    <input type="text" id="email" name="email" value="{{ \Illuminate\Support\Facades\Auth::user()->email ?? '' }}">
                                    @error('email')
                                    <div class="text-danger" style="margin-top: -20px; margin-bottom: 10px; margin-left: 7px">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone">Phone<span>*</span></label>
                                    <input type="text" id="phone" name="phone" value="{{ \Illuminate\Support\Facades\Auth::user()->phone ?? '' }}">
                                    @error('phone')
                                    <div class="text-danger" style="margin-top: -20px; margin-bottom: 10px; margin-left: 7px">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <input type="text" placeholder="Enter Your Coupon Code">
                            </div>
                            <div class="place-order">
                                <h4>Your Order</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Product <span>Total</span></li>
                                        @foreach($carts as $cart)
                                            <li class="fw-normal">
                                                {{ $cart->name }} x {{ $cart->qty }}
                                                <span>${{ $cart->price * $cart->qty }}</span>
                                            </li>
                                        @endforeach
                                        <li class="fw-normal">Subtotal <span>${{ $subtotal }}</span></li>
                                        <li class="total-price">Total <span>${{ $total }}</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Pay later
                                                <input type="radio" name="payment_type" id="pc-check" value="pay_later" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-paypal">
                                                Online payment
                                                <input type="radio" name="payment_type" id="pc-paypal" value="online_payment">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12">
                            <h4 class="text-center">Your Cart is empty</h4>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
