@extends('website.master2')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($carts)
                                    @foreach ($carts as $key => $data)
                                        <tr>
                                            <td class="cart__product__item">
                                                <img src="img/shop-cart/cp-1.jpg" alt="">
                                                <div class="cart__product__item__title">
                                                    <h6>{{ $data['product_name'] }}</h6>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">{{ $data['product_price'] }}</td>
                                            <td>
                                                <div class="col-md-6">
                                                    <form action="{{ route('cart.qty.update', $key) }}" method="get">
                                                        @csrf

                                                        <input type="number" class="form-control"
                                                            value="{{ $data['product_qty'] }}" name="quantity" required>
                                                        <button class="btn btn-primary" type="submit">
                                                            <i class="fa fa-refresh"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="cart__total">{{ $data['sub_total'] }}
                                                {{-- <span>
                                                    {{ array_sum(array_column($carts, 'sub_total')) }}
                                                </span> --}}
                                                {{-- <td class="cart__close"><span class="icon_close"></span></td> --}}
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="{{ route('cart.clear') }}"><span class="icon_loading"></span> Clear cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            {{-- <li><a href="{{ route('cart.clear') }}">Clear cut shampoo</a></li> --}}
                            <li></span></li>
                            {{-- <li>Total <span>{{ array_sum(array_column($carts, 'sub_total')) + 50 }}</li> --}}
                        </ul>
                        <a href="{{ route('check.out.form') }}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
@endsection
