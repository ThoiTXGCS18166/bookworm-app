<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Bookworm Customer Cart Page</title>
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
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
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
                    <a class="nav-link" href="{{URL::to('/shop')}}">Shop</a>
                    <a class="nav-link" href="{{URL::to('/about')}}">About</a>
                    <a class="nav-link" href="{{URL::to('/show-cart')}}">Cart(<?php echo $cart_number;?>)</a>
                </form>
            </div>
        </div>
    </nav>

    <h2 style="margin-top:25px;margin-left:50px;margin-bottom:25px;">Your cart: <?php echo $cart_number;?> items</h2>
    <hr style="margin-left:50px;margin-right:25px;margin-bottom:10px;">

    <?php
        $content = Cart::content();
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_date = time();
        $current_time = date("Y-m-d",$current_date);
    ?>

    <div class="w3-container">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-9">
                <div class="card text-dark bg-light mb-3" style="max-width: 65rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3 col-sm-5 col-lg-5">
                                <strong>Product</strong>
                            </div>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <strong>Price</strong>
                            </div>
                            <div class="col-5 col-sm-3 col-lg-3">
                                <strong>Quantity</strong>
                            </div>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <strong>Total</strong>
                            </div>
                        </div>
                    </div>
                    @foreach($content as $v_content)
                    <?php
                    if(is_null($v_content->options->image)){
                        $v_content->options->image = "book.jpg";
                    } else {
                        $v_content->options->image = $v_content->options->image;
                    }
                    ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 col-sm-5 col-lg-5">
                                <div class="row">
                                    <div class="col-12 col-md-8 col-lg-8">
                                        <a href="{{URL::to('/book-detail-show-new/'.$v_content->id)}}">
                                        <img src="{{URL::to('book/'.$v_content->options->image)}}"
                                            style="max-height:330px;" class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h4>{{$v_content->name}}</h4>
                                        <p>{{$v_content->options->author}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <?php
                                $book_price = $v_content->price;
                                if(is_null($v_content->options->discount_price)){
                                    echo '<h5>$'.number_format($v_content->price,2).'</h5>';
                                } else{
                                    if(is_null($v_content->options->discount_end_date) || (($current_time >= $v_content->options->discount_start_date)&& ($current_time <= $v_content->options->discount_end_date))){
                                        echo '<h5>$'.$v_content->options->discount_price.'</h5>';
                                    } else {
                                        echo '<h5>$'.number_format($v_content->price,2).'</h5>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-5 col-sm-3 col-lg-3">
                                <div class="number-container" style="width:100%">
                                    <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                                        {{ csrf_field() }}
                                        <input name="cart_quantity" type="number" style="width:60%;" min="1"
                                            value="{{$v_content->qty}}" max="8" step="1" />
                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart"
                                            class="form-control">
                                        <button type="submit" class="btn btn-dark" name="update_qty">Update</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <strong>
                                    <?php
                                    if(is_null($v_content->options->discount_price)){
                                        $subtotal = $v_content->price * $v_content->qty;
                                        echo '<h7>$'.number_format($subtotal,2).'</h7>';
                                    } else{
                                        if(is_null($v_content->options->discount_end_date) || (($current_time >= $v_content->options->discount_start_date)&& ($current_time <= $v_content->options->discount_end_date))){
                                            $subtotal = $v_content->options->discount_price * $v_content->qty;
                                            $v_content->price = $v_content->options->discount_price;
                                            echo '<h7>$'.number_format($subtotal,2).'</h7>';
                                        } else {
                                            $subtotal = $v_content->price * $v_content->qty;
                                            echo '<h7>$'.number_format($subtotal,2).'</h7>';
                                        }
                                    }
                                    ?>
                                </strong>
                                <button type="button" class="btn btn-dark"><a
                                        href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i
                                            class="fa fa-times"></i></a></button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-3">
                <div class="card text-center text-dark bg-light mb-3" style="max-width: 20rem;">
                    <div class="card-header"><strong>Cart Totals</strong></div>
                    <br>
                    <?php
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $order_date = time();
                        $order_time = date("Y-m-d H:i:s",$order_date)
                    ?>
                    <div class="card-body">
                        <form role="form" action="{{URL::to('/order-place')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="order_date" class="form-control"
                                            value="{{$order_time}}" id="exampleInputTitle">
                            <h5 class="card-title">{{'$'.Cart::subtotal().''}}</h5>
                            <br>
                            <button type="submit" style="width:100%;margin-bottom:15px;" class="btn btn-secondary">Place
                                order</button>
                        </form>
                    </div>
                </div>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>