@extends('front.layout.master')

@section('title')
product
@endsection

@section('content')


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="shop.blade.php">Shop</a>
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('front.shop.components.products-sidebar-filter')
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="front/img/products/{{ $product->productImages[0]->path ?? '' }}"
                                alt="">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                @foreach ($product->productImages as $productImage)
                                <div class="pt active" data-imgbigurl="front/img/products/{{ $productImage->path }}">
                                    <img src="front/img/products/{{ $productImage->path }}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{ $product->tag }}</span>
                                <h3>{{ $product->name }}</h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if ($i <=$product->avgRating)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                                    <span>({{ count($product->productComments) }})</span>
                            </div>
                            <div class="pd-desc">
                                <p>{{ $product->content }}</p>
                                @if ($product->discount !=null)
                                    <h4>${{ $product->discount }} <span>{{ $product->price }}</span></h4>
                                @else
                                    <h4>${{ $product->price }}</h4>
                                @endif

                            </div>
                            <div class="pd-color">
                                <h6>Color</h6>
                                <div class="pd-color-choose">
                                    @foreach (array_unique(array_column($product->productDetails->toArray(),'color')) as $productColor)
                                        <div class="cc-item">
                                            <input type="radio" id="cc-{{ $productColor }}">
                                            <label for="cc-{{ $productColor }}" class="cc-{{ $productColor }}"></label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pd-size-choose">
                                @foreach (array_unique(array_column($product->productDetails->toArray(),'size')) as $productSize)
                                    <div class="sc-item">
                                        <input type="radio" id="sm-{{ $productSize }}">
                                        <label for="sm-{{ $productSize }}">{{ $productSize }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="quantity">
{{--                                <div class="pro-qty">--}}
{{--                                    <input type="text" value="{{ $product->qty }}">--}}
{{--                                </div>--}}
                                <a href="javascript:addCart({{ $product->id }})" class="primary-btn pd-cart">Add To Cart</a>
                            </div>
                            <ul class="pd-tags">
                                <li><span>CATEGORIES</span>: {{ $product->productCategory->name }}</li>
                                <li><span>TAGS</span>: {{ $product->tag }}</li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">Sku : {{ $product->sku }}</div>
                                <div class="pd-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews ({{ count($product->productComments) }})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-catagory">Customer Rating</td>
                                            <td>
                                                <div class="pd-rating">
                                                    @for($i=1;$i<=5;$i++)
                                                        @if($i <= $product->avgRating)
                                                            <i class="fa fa-star"></i>
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                    @endfor
                                                    <span>({{ count($product->productComments) }})</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Price</td>
                                            <td>
                                                <div class="p-price">${{ $product->price }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Add To Cart</td>
                                            <td>
                                                <div class="cart-add">+ add to cart</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Availability</td>
                                            <td>
                                                <div class="p-stock">{{ $product->qty }} in stock</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Weight</td>
                                            <td>
                                                <div class="p-weight">{{ $product->weight }}kg</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Size</td>
                                            <td>
                                                <div class="p-size">
                                                    @foreach (array_unique(array_column($product->productDetails->toArray(),'size')) as $productSize)
                                                        {{ $productSize }}
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Color</td>
                                            <td>
                                                @foreach (array_unique(array_column($product->productDetails->toArray(),'color')) as $productColor)
                                                    <span class="cc-{{ $productColor }}">{{ $productColor }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Sku</td>
                                            <td>
                                                <div class="p-code">{{ $product->sku }}</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option">
                                    <h4>{{ count($product->productComments) }} Comments</h4>
                                    <div class="comment-option">
                                        @foreach ($product->productComments as $productComment)
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="front/img/user/{{ $productComment->user->avatar ?? 'default-avatars.jpg' }}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $productComment->rating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <h5>{{ $productComment->name }} <span>{{ date('M d, Y',strtotime($productComment->created_at)) }}</span></h5>
                                                    <div class="at-reply">{{ $productComment->messages }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="leave-comment">
                                        <h4>Leave A Comment</h4>
                                        <form action="" method="POST" class="comment-form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}" id="">
                                            <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}" id="">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Name" name="name" value="{{ \Illuminate\Support\Facades\Auth::user()->name ?? '' }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Email" name="email" value="{{ \Illuminate\Support\Facades\Auth::user()->email ?? '' }}">
                                                </div>
                                                <div class="col-lg-12">
                                                    <text   area placeholder="Messages" name="messages"></textarea>

                                                    <style>
                                                            /* Rating */
                                                        .rate {
                                                            float: left;
                                                            height: 46px;
                                                            padding: 0 10px;
                                                        }
                                                        .rate:not(:checked) > input {
                                                            display: none;
                                                        }
                                                        .rate:not(:checked) > label {
                                                            float:right;
                                                            width:1em;
                                                            overflow:hidden;
                                                            white-space:nowrap;
                                                            cursor:pointer;
                                                            font-size:30px;
                                                            color:#ccc;
                                                        }
                                                        .rate:not(:checked) > label:before {
                                                            content: '??? ';
                                                        }
                                                        .rate > input:checked ~ label {
                                                            color: #ffc700;
                                                        }
                                                        .rate:not(:checked) > label:hover,
                                                        .rate:not(:checked) > label:hover ~ label {
                                                            color: #deb217;
                                                        }
                                                        .rate > input:checked + label:hover,
                                                        .rate > input:checked + label:hover ~ label,
                                                        .rate > input:checked ~ label:hover,
                                                        .rate > input:checked ~ label:hover ~ label,
                                                        .rate > label:hover ~ input:checked ~ label {
                                                            color: #c59b08;
                                                        }

                                                    </style>

                                                    <div class="personal-rating">
                                                        <h6>Your Rating</h6>
                                                        <div class="rate">
                                                            <input type="radio" id="star5" name="rating" value="5" />
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" id="star4" name="rating" value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" name="rating" value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" name="rating" value="2" />
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" name="rating" value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="site-btn">Send message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedProducts as $product)
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="front/img/products/{{ $product->productImages[0]->path ?? '' }}" alt="">
                            @if($product->discount !=null)
                                <div class="sale">Sale</div>
                            @endif
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="javascript:addCart({{ $product->id }})"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="shop/product/{{$product->id}}">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$product->tag}}</div>
                            <a href="shop/product/{{$product->id}}">
                                <h5>{{$product->name}}</h5>
                            </a>
                            <div class="product-price">
                                @if($product->discount != null)
                                    ${{$product->discount}}
                                    <span>${{$product->price}}</span>
                                @else
                                    ${{$product->price}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Related Products Section End -->

@endsection
