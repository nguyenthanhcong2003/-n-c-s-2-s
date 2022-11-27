@extends('front.layout.master')

@section('title')
    my-order
@endsection

@section('content')
    <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>My Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- My order Section Begin -->
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <th style="width: 160px">ID</th>
                                    <th class="p-name">Products</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="first-row">#{{ $order->id }}</td>
                                            <td class="cart-title first-row">
                                                <h5>
                                                    {{ $order->orderDetails[0]->product->name }}
                                                    @if(count($order->orderDetails) > 1)
                                                        (and {{ count($order->orderDetails) }} other products)
                                                    @endif
                                                </h5>
                                            </td>
                                            <td class="total-price first-row">
                                                ${{ array_sum(array_column($order->orderDetails->toArray(),'total')) }}
                                            </td>
                                            <td class="first-row">
                                                <a class="btn" href="./account/my-order/{{ $order->id }}">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- My order Section End -->

@endsection
