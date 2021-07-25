<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Bookworm About Us Page</title>
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
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
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
                $cart_number = Cart::count();
                ?>
                <form class="d-flex">
                    <a class="nav-link" href="{{URL::to('/home')}}">Home</a>
                    <a class="nav-link" href="{{URL::to('/shop')}}">Shop</a>
                    <a class="nav-link" href="{{URL::to('/about')}}"><u>About</u></a>
                    <a class="nav-link" href="{{URL::to('/show-cart')}}">Cart(<?php echo $cart_number;?>)</a>
                </form>
            </div>
        </div>
    </nav>

    <h2 style="margin-top:25px;margin-left:50px;margin-bottom:25px;">About Us</h2>
    <hr style="margin-left:50px;margin-right:25px;margin-bottom:10px;">

    <div class="container">
        <h1 style="text-align:center;margin-bottom:20px;">Welcome to Bookworm</h1>
        <br>
        <p style="font-size:30px;">"Bookworm is an independent New York bookstore and language school with locations in
            Manhattan and Brooklyn. We specialize in travel books and language classes."</p>
        <br>
        <div class="row">
            <div class="col">
                <h1>Our Story</h1>
                <br>
                <p style="font-size:25px;">The name Bookworm was taken from the original name for New York International Airport, which was renamed JFK in December 1963.</p>
                <p style="font-size:25px;">Our Manhattan store has just moved to the West Village. Our new location is 170 7th Avenue South, at the corner of Perry Street.</p>
                <p style="font-size:25px;">From March 2008 through May 2016, the store was located in the Flatiron District.</p>
            </div>
            <div class="col">
                <h1>Our Vision</h1>
                <br>
                <p style="font-size:25px;">One of the last travel bookstores in the country, our Manhattan store carries a range of guidebooks (all 10% off) to suit the needs and tastes of every traveler and budget.</p>
                <p style="font-size:25px;">We believe that a novel or travelogue can be just as valuable a key to a place as any guidebook, and our well-read, well-traveled staff is happy to make reading recommendations for any traveler, book lover, or gift giver.</p>
            </div>
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