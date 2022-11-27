<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Template</title>

    <link rel='shortcut icon' href="{{ asset('front/img/logo_title.png') }}" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <base href="{{ asset('/') }}">
    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.0/tailwind.min.css">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i> tcshopfd@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i> +84 86.504.9035
                    </div>
                </div>
                <div class="ht-right">

                    @if(\Illuminate\Support\Facades\Auth::check())
                        <style>
                            /* Thiết lập vị trí cho thẻ div với class dropdown*/
                            .dropdown {
                                position: relative;
                                display: inline-block;
                            }
                            /* Nội dung Dropdown */
                            .noidung_dropdown {
                                /*Ẩn nội dụng các đường dẫn*/
                                display: none;
                                margin-top: 10px;
                                border-radius: 10px;
                                margin-left: 80px;
                                position: absolute;
                                background-color: #BBBBBB;
                                min-width: 130px;
                                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                z-index: 1;
                            }
                            /* Thiết kế style cho các đường dẫn tronng Dropdown */
                            .noidung_dropdown a {
                                color: black;
                                padding: 12px 16px;
                                text-decoration: none;
                                display: block;
                                border-radius: 10px;
                            }
                            .hienThi{
                                display:block;
                            }
                            /* thay đổi màu background khi hover vào đường dẫn */
                            .noidung_dropdown a:hover {background-color: #ddd;}
                        </style>
                        <script>
                            function hamDropdown() {
                                document.querySelector(".noidung_dropdown").classList.toggle("hienThi");
                            }
                            window.onclick = function(e) {
                                if (!e.target.matches('.nut_dropdown')) {
                                    var noiDungDropdown = document.querySelector(".noidung_dropdown");
                                    if (noiDungDropdown.classList.contains('hienThi')) {
                                        noiDungDropdown.classList.remove('hienThi');
                                    }
                                }
                            }
                        </script>
                        <div class="dropdown login-panel">
                            <button  onclick="hamDropdown()"  class="nut_dropdown">
                                Hello,
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <div class="noidung_dropdown">
                                <a href="./account/logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                            </div>
                        </div>
                    @else
                        <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    @endif


                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt'data-imagecss="flag yt"
                                data-title="English"> English </option>
                            <option value='yu' data-imagecss="flag yu"
                                data-title="Bangladesh"> German </option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./">
                                <img src="front/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <form action="shop">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">All Categories</button>
                                <div class="input-group">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="What do you need?">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="./cart">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{ Cart::count() }}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach(Cart::content() as $cart)
                                                    <tr data-rowId ={{ $cart->rowId }}>
                                                        <td class="si-pic">
                                                            <img src="front/img/products/{{ $cart->options->images[0]->path }}" alt="" style="height: 70px">
                                                        </td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>${{ $cart->price }} x {{ $cart->qty }}</p>
                                                                <h6>{{ $cart->name }}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i onclick="removeCart('{{ $cart->rowId }}')"  class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>${{ Cart::total() }}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="./checkout" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">${{ Cart::total() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid s Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Home</a></li>
                        <li class="{{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="./shop">Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men s</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
                        <li class="{{ (request()->segment(1) == 'blog') ? 'active' : '' }}"><a href="./blog">Blog</a></li>
                        <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}"><a href="./contact">Contact</a></li>
                        <li><a href="./account/my-order">My Order</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield('content')

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="./"><img src="front/img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="front/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->

    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="{{ asset('front/js/owlcarousel2-filter.min.js') }}"></script>


    {{--    sweetalert--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    @yield('scrip')
    <script>
        function addCart(productId){
            $.ajax({
                type: "GET",
                url: "cart/add",
                data:{productId: productId},
                success:function (response){
                    $('.cart-count').text(response['count']);
                    $('.cart-price').text('$' + response['total']);
                    $('.select-total h5').text('$' + response['total']);

                    var cartHover_tbody = $('.select-items tbody');
                    var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='"+ response['cart'].rowId +"']");

                    if(cartHover_existItem.length){
                        cartHover_existItem.find('.product-selected p').text('$' + response['cart'].price.toFixed(2) + ' x ' + response['cart'].qty);
                    }else{
                        var newItem =
                            '<tr data-rowId ="'+ response['cart'].rowId + '">\n'+
                            '    <td class="si-pic">\n'+
                            '        <img src="front/img/products/'+ response['cart'].options.images[0].path +'" alt="" style="height: 70px">\n'+
                            '    </td>\n'+
                            '    <td class="si-text">\n'+
                            '        <div class="product-selected">\n'+
                            '            <p>$'+ response['cart'].price.toFixed(2) + ' x ' + response['cart'].qty +'</p>\n'+
                            '            <h6>'+ response['cart'].name +'</h6>\n'+
                            '        </div>\n'+
                            '    </td>\n'+
                            '    <td class="si-close">\n'+
                            '        <i onclick="removeCart(\'' + response['cart'].rowId + '\')" class="ti-close"></i>\n'+
                            '    </td>\n'+
                            '</tr>';
                        cartHover_tbody.append(newItem);
                    }
                    Swal.fire(
                        'Success',
                        response['cart'].name,
                        'success'
                    )
                },
                error: function (response){
                    alert('Add failed');
                    console.log(response);
                }
            });
        }
        function removeCart(rowId){
            $.ajax({
                type: "GET",
                url: "cart/delete",
                data:{rowId: rowId},
                success:function (response){
                    // sử lý phần cart hover (trang master-page)
                    $('.cart-count').text(response['count']);
                    $('.cart-price').text('$' + response['total']);
                    $('.select-total h5').text('$' + response['total']);
                    var cartHover_tbody = $('.select-items tbody');
                    var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='"+ rowId +"']");
                    cartHover_existItem.remove();

                    // sử lý ở trong trang shop/cart
                    var cart_tbody = $('.cart-table tbody');
                    var cart_existItem = cart_tbody.find("tr" + "[data-rowId='"+ rowId +"']");
                    cart_existItem.remove();
                    $('.subtotal span').text('$' + response['subtotal']);
                    $('.cart-total span').text('$' + response['total']);
                },
                error: function (response){
                    alert('Delete failed');
                    console.log(response);
                }
            });
        }
        function destroyCart(){
            $.ajax({
                type: "GET",
                url: "cart/destroy",
                data:{},
                success:function (response){
                    // sử lý phần cart hover (trang master-page)
                    $('.cart-count').text('0');
                    $('.cart-price').text('0');
                    $('.select-total h5').text('0');
                    var cartHover_tbody = $('.select-items tbody');
                    cartHover_tbody.children().remove();

                    // sử lý ở trong trang shop/cart
                    var cart_tbody = $('.cart-table tbody');
                    cart_tbody.children().remove();
                    $('.subtotal span').text('0');
                    $('.cart-total span').text('0');
                },
                error: function (response){
                    alert('Delete failed');
                    console.log(response);
                }
            });
        }
        function updateCart(rowId, qty){
            $.ajax({
                type: "GET",
                url: "cart/update",
                data:{rowId:rowId, qty:qty},
                success:function (response){
                    // sử lý phần cart hover (trang master-page)
                    $('.cart-count').text(response['count']);
                    $('.cart-price').text('$' + response['total']);
                    $('.select-total h5').text('$' + response['total']);
                    var cartHover_tbody = $('.select-items tbody');
                    var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='"+ rowId +"']");

                    if(qty === 0){
                        cartHover_existItem.remove();
                    }else {
                        cartHover_existItem.find('.product-selected p').text('$' + response['cart'].price.toFixed(2) + ' x ' + response['cart'].qty);
                    }

                    // sử lý ở trong trang shop/cart
                    var cart_tbody = $('.cart-table tbody');
                    var cart_existItem = cart_tbody.find("tr" + "[data-rowId='" + rowId + "']");
                    if(qty === 0){
                        cart_existItem.remove();
                    }else{
                        cart_existItem.find('.total-price').text('$' + (response['cart'].price * response['cart'].qty).toFixed(2));
                    }
                    $('.subtotal span').text('$' + response['subtotal']);
                    $('.cart-total span').text('$' + response['total']);
                },
                error: function (response){
                    alert('Delete failed');
                    console.log(response);
                }
            });
        }

    </script>
</body>

</html>
