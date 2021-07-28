<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Bookworm Books Display Page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="frontend/images/logo.png" height="32" width="32" alt="">
                <strong> BOOKWORM</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <?php
                $cart_number = Cart::content()->count();
                ?>
                <form class="d-flex">
                    <a class="nav-link" href="{{URL::to('/home')}}">Home</a>
                    <a class="nav-link" href="{{URL::to('/shop')}}"><u>Shop</u></a>
                    <a class="nav-link" href="{{URL::to('/about')}}">About</a>
                    <a class="nav-link" href="{{URL::to('/show-cart')}}">Cart(<?php echo $cart_number;?>)</a>
                </form>
            </div>
        </div>
    </nav>

    <p style="margin-top:25px;margin-left:50px;margin-bottom:25px;"><strong style="font-size:20px;">Books</strong>
        (Filtered by )</p>
    <hr style="margin-left:50px;margin-right:25px;margin-bottom:0px;">

    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <div id="sidebar" class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <h5>Filter By</h5>
                <div class="container">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Category
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    @foreach($category as $key => $book_category)
                                    <p><strong><a
                                                href="{{URL::to('/book-category/'.$book_category->id)}}">{{$book_category->category_name}}</a></strong>
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                    Author
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    @foreach($author as $key => $book_author)
                                    <p><strong><a
                                                href="{{URL::to('/book-author/'.$book_author->id)}}">{{$book_author->author_name}}</a></strong>
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                    Rating Review
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <p>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <a href="{{URL::to('/book-rating-1-star')}}">(1 Star)</a>
                                    </p>
                                    <p>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <a href="{{URL::to('/book-rating-2-star')}}">(2 Star)</a>
                                    </p>
                                    <p>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <a href="{{URL::to('/book-rating-3-star')}}">(3 Star)</a>
                                    </p>
                                    <p>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <a href="{{URL::to('/book-rating-4-star')}}">(4 Star)</a>
                                    </p>
                                    <p>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <a href="{{URL::to('/book-rating-5-star')}}">(5 Star)</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @yield('content')

        </div>
    </div>


    <footer>
        <div class="footer-content">
            <img src="frontend/images/logo.png" height="64" width="64" alt="">
            <h7>BOOKWORM</h7>
            <p>Address</p>
            <p>Phone</p>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>