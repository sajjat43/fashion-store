<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OFDEM</title>

    <!-- Google Font -->
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Cookie&display=swap') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Offcanvas Menu Begin -->

    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('website.fixed.header')
    <!-- Header Section End -->
    {{-- ------------------------------------- feature product ----------------------- --}}


    {{-- <div class="py-5">
        <div class="container ">
            <div class="row">
                <h2>Featured Product</h2>
                <div class="owl-carousel owl-theme owl-img-responsive">
                    <div class="row">

                        @foreach ($product as $item)
                            <div class="item">
                                <div class="card ">
                                    <img src="{{ url('/uploads/uploads/product/', $item->image) }}"
                                        style="border-radius:4px" margin-left="20%" height="200px" width="200px"
                                        alt="product image">
                                    <div class="card-body">
                                        <h5>Name: {{ $item->name }}</h5>
                                        <span class="float-start">Price: {{ $item->price }}</span>
                                        <p>
                                            Short description: {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div> --}}


    <!-- Categories Section Begin banner-->
    @include('website.fixed.banner')
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Banner slider Section Begin -->
    @include('website.fixed.slider')
    <!-- Banner Section End -->

    <!-- Footer Section Begin -->
    @include('website.fixed.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->
    {{-- <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script> --}}
    <!-- Js Plugins -->
    <script src="{{ url('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('frontend/js/main.js') }}"></script>
</body>

</html>
