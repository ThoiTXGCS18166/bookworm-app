<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Bookworm Homepage</title>
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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                    <a class="nav-link" href="{{URL::to('/home')}}"><u>Home</u></a>
                    <a class="nav-link" href="{{URL::to('/shop')}}">Shop</a>
                    <a class="nav-link" href="{{URL::to('/about')}}">About</a>
                    <a class="nav-link" href="{{URL::to('/show-cart')}}">Cart(<?php echo $cart_number;?>)</a>
                </form>
            </div>
        </div>
    </nav>


    <div class="row" style="margin-top:20px;margin-left:85px;margin-right:85px;">
        <div class="col">
            <span class="span-text" style="font-size: 25px;">On Sale</span>
        </div>
        <div class="col">
            <a href="{{URL::to('/shop/')}}" class="btn"
                style="background-color: gray;color: white;font-size:13px;float:right;">View
                All
                <i class="fa fa-play"></i></a>
        </div>
    </div>

    <?php
    $x = 0;
    ?>
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($book_sale as $key => $book_sale_item)
                <?php
                    if(is_null($book_sale_item->book_cover_photo)){
                        $book_sale_item->book_cover_photo = "book.jpg";
                    }
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $current_date = time();
                    $current_time = date("Y-m-d",$current_date);

                    if($x == 0){
                        echo '<div class="carousel-item active">';
                            echo '<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-4 g-4">';
                                echo '<div class="col">';
                                    echo '<div class="card h-100" style="width: 16rem;margin:auto;">';
                                        echo '<a href="../book-detail-show-new/'.$book_sale_item->id.'"><img
                                        src="/book/'.$book_sale_item->book_cover_photo.'"
                                        class="card-img-top" alt="..."></a>';
                                        echo '<div class="card-body">';
                                            echo '<strong style="font-size:14px">'.$book_sale_item->book_title.'</strong>';
                                            echo '<p class="card-text">'.$book_sale_item->author_name.'</p>';
                                        echo '</div>';
                                        echo '<div class="card-footer">';
                                        if(is_null($book_sale_item->discount_price)){
                                            echo '$'.$book_sale_item->book_price;
                                        } else{
                                            if(is_null($book_sale_item->discount_end_date) || (($current_time >= $book_sale_item->discount_start_date)&& ($current_time <= $book_sale_item->discount_end_date))){
                                                echo '<del>$'.$book_sale_item->book_price.'</del> $'.$book_sale_item->discount_price;
                                            } else {
                                                echo '$'.$book_sale_item->book_price;
                                            }
                                        }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                $x = $x + 1;
                    } else {
                        if($x > 0 && $x < 3){
                            echo '<div class="col">';
                                echo '<div class="card h-100" style="width: 16rem;margin:auto;">';
                                    echo '<a href="../book-detail-show-new/'.$book_sale_item->id.'"><img
                                    src="/book/'.$book_sale_item->book_cover_photo.'"
                                    class="card-img-top" alt="..."></a>';
                                    echo '<div class="card-body">';
                                        echo '<strong style="font-size:14px">'.$book_sale_item->book_title.'</strong>';
                                        echo '<p class="card-text">'.$book_sale_item->author_name.'</p>';
                                    echo '</div>';
                                    echo '<div class="card-footer">';
                                        if(is_null($book_sale_item->discount_price)){
                                            echo '$'.$book_sale_item->book_price;
                                        } else{
                                            if(is_null($book_sale_item->discount_end_date) || (($current_time >= $book_sale_item->discount_start_date)&& ($current_time <= $book_sale_item->discount_end_date))){
                                                echo '<del>$'.$book_sale_item->book_price.'</del> $'.$book_sale_item->discount_price;
                                            } else {
                                                    echo '$'.$book_sale_item->book_price;
                                            }
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            $x = $x + 1;
                        }elseif($x == 3){
                                    echo '<div class="col">';
                                        echo '<div class="card h-100" style="width: 16rem;margin:auto;">';
                                            echo '<a href="../book-detail-show-new/'.$book_sale_item->id.'"><img
                                            src="/book/'.$book_sale_item->book_cover_photo.'"
                                            class="card-img-top" alt="..."></a>';
                                            echo '<div class="card-body">';
                                                echo '<strong style="font-size:14px">'.$book_sale_item->book_title.'</strong>';
                                                echo '<p class="card-text">'.$book_sale_item->author_name.'</p>';
                                            echo '</div>';
                                            echo '<div class="card-footer">';
                                                if(is_null($book_sale_item->discount_price)){
                                                    echo '$'.$book_sale_item->book_price;
                                                } else{
                                                    if(is_null($book_sale_item->discount_end_date) || (($current_time >= $book_sale_item->discount_start_date)&& ($current_time <= $book_sale_item->discount_end_date))){
                                                        echo '<del>$'.$book_sale_item->book_price.'</del> $'.$book_sale_item->discount_price;
                                                } else {
                                                    echo '$'.$book_sale_item->book_price;
                                                }
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';    
                            $x = $x + 1;
                        }elseif($x == 4){
                            echo '<div class="carousel-item">';
                            echo '<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-4 g-4">';
                                echo '<div class="col">';
                                    echo '<div class="card h-100" style="width: 16rem;margin:auto;">';
                                        echo '<a href="../book-detail-show-new/'.$book_sale_item->id.'"><img
                                        src="/book/'.$book_sale_item->book_cover_photo.'"
                                        class="card-img-top" alt="..."></a>';
                                        echo '<div class="card-body">';
                                            echo '<strong style="font-size:14px">'.$book_sale_item->book_title.'</strong>';
                                            echo '<p class="card-text">'.$book_sale_item->author_name.'</p>';
                                        echo '</div>';
                                        echo '<div class="card-footer">';
                                        if(is_null($book_sale_item->discount_price)){
                                            echo '$'.$book_sale_item->book_price;
                                        } else{
                                            if(is_null($book_sale_item->discount_end_date) || (($current_time >= $book_sale_item->discount_start_date)&& ($current_time <= $book_sale_item->discount_end_date))){
                                                echo '<del>$'.$book_sale_item->book_price.'</del> $'.$book_sale_item->discount_price;
                                            } else {
                                                echo '$'.$book_sale_item->book_price;
                                            }
                                        }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                $x = $x + 1;
                        }elseif($x > 4 && $x < 7){
                            echo '<div class="col">';
                                echo '<div class="card h-100" style="width: 16rem;margin:auto;">';
                                    echo '<a href="../book-detail-show-new/'.$book_sale_item->id.'"><img
                                    src="/book/'.$book_sale_item->book_cover_photo.'"
                                    class="card-img-top" alt="..."></a>';
                                    echo '<div class="card-body">';
                                        echo '<strong style="font-size:14px">'.$book_sale_item->book_title.'</strong>';
                                        echo '<p class="card-text">'.$book_sale_item->author_name.'</p>';
                                    echo '</div>';
                                    echo '<div class="card-footer">';
                                        if(is_null($book_sale_item->discount_price)){
                                            echo '$'.$book_sale_item->book_price;
                                        } else{
                                            if(is_null($book_sale_item->discount_end_date) || (($current_time >= $book_sale_item->discount_start_date)&& ($current_time <= $book_sale_item->discount_end_date))){
                                                echo '<del>$'.$book_sale_item->book_price.'</del> $'.$book_sale_item->discount_price;
                                            } else {
                                                echo '$'.$book_sale_item->book_price;
                                            }
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            $x = $x + 1;
                        }elseif($x == 7){
                                    echo '<div class="col">';
                                        echo '<div class="card h-100" style="width: 16rem;margin:auto;">';
                                            echo '<a href="../book-detail-show-new/'.$book_sale_item->id.'"><img
                                            src="/book/'.$book_sale_item->book_cover_photo.'"
                                            class="card-img-top" alt="..."></a>';
                                            echo '<div class="card-body">';
                                                echo '<strong style="font-size:14px">'.$book_sale_item->book_title.'</strong>';
                                                echo '<p class="card-text">'.$book_sale_item->author_name.'</p>';
                                            echo '</div>';
                                            echo '<div class="card-footer">';
                                                if(is_null($book_sale_item->discount_price)){
                                                    echo '$'.$book_sale_item->book_price;
                                                } else{
                                                    if(is_null($book_sale_item->discount_end_date) || (($current_time >= $book_sale_item->discount_start_date)&& ($current_time <= $book_sale_item->discount_end_date))){
                                                        echo '<del>$'.$book_sale_item->book_price.'</del> $'.$book_sale_item->discount_price;
                                                } else {
                                                    echo '$'.$book_sale_item->book_price;
                                                }
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';    
                            $x = $x + 1;
                        }elseif($x == 8){
                            echo '<div class="carousel-item">';
                            echo '<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-4 g-4">';
                                echo '<div class="col">';
                                    echo '<div class="card h-100" style="width: 16rem;margin:auto;">';
                                        echo '<a href="../book-detail-show-new/'.$book_sale_item->id.'"><img
                                        src="/book/'.$book_sale_item->book_cover_photo.'"
                                        class="card-img-top" alt="..."></a>';
                                        echo '<div class="card-body">';
                                            echo '<strong style="font-size:14px">'.$book_sale_item->book_title.'</strong>';
                                            echo '<p class="card-text">'.$book_sale_item->author_name.'</p>';
                                        echo '</div>';
                                        echo '<div class="card-footer">';
                                        if(is_null($book_sale_item->discount_price)){
                                            echo '$'.$book_sale_item->book_price;
                                        } else{
                                            if(is_null($book_sale_item->discount_end_date) || (($current_time >= $book_sale_item->discount_start_date)&& ($current_time <= $book_sale_item->discount_end_date))){
                                                echo '<del>$'.$book_sale_item->book_price.'</del> $'.$book_sale_item->discount_price;
                                            } else {
                                                echo '$'.$book_sale_item->book_price;
                                            }
                                        }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                $x = $x + 1;
                        }elseif($x > 8 && $x < 10) {
                            echo '<div class="col">';
                                echo '<div class="card h-100" style="width: 16rem;margin:auto;">';
                                    echo '<a href="../book-detail-show-new/'.$book_sale_item->id.'"><img
                                    src="/book/'.$book_sale_item->book_cover_photo.'"
                                    class="card-img-top" alt="..."></a>';
                                    echo '<div class="card-body">';
                                        echo '<strong style="font-size:14px">'.$book_sale_item->book_title.'</strong>';
                                        echo '<p class="card-text">'.$book_sale_item->author_name.'</p>';
                                    echo '</div>';
                                    echo '<div class="card-footer">';
                                        if(is_null($book_sale_item->discount_price)){
                                            echo '$'.$book_sale_item->book_price;
                                        } else{
                                            if(is_null($book_sale_item->discount_end_date) || (($current_time >= $book_sale_item->discount_start_date)&& ($current_time <= $book_sale_item->discount_end_date))){
                                                echo '<del>$'.$book_sale_item->book_price.'</del> $'.$book_sale_item->discount_price;
                                            } else {
                                                echo '$'.$book_sale_item->book_price;
                                            }
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            $x = $x + 1;
                        }else{
                                    echo '<div class="col">';
                                        echo '<div class="card h-100" style="width: 16rem;margin:auto;">';
                                            echo '<a href="../book-detail-show-new/'.$book_sale_item->id.'"><img
                                            src="/book/'.$book_sale_item->book_cover_photo.'"
                                            class="card-img-top" alt="..."></a>';
                                            echo '<div class="card-body">';
                                                echo '<strong style="font-size:14px">'.$book_sale_item->book_title.'</strong>';
                                                echo '<p class="card-text">'.$book_sale_item->author_name.'</p>';
                                            echo '</div>';
                                            echo '<div class="card-footer">';
                                                if(is_null($book_sale_item->discount_price)){
                                                    echo '$'.$book_sale_item->book_price;
                                                } else{
                                                    if(is_null($book_sale_item->discount_end_date) || (($current_time >= $book_sale_item->discount_start_date)&& ($current_time <= $book_sale_item->discount_end_date))){
                                                        echo '<del>$'.$book_sale_item->book_price.'</del> $'.$book_sale_item->discount_price;
                                                } else {
                                                    echo '$'.$book_sale_item->book_price;
                                                }
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';    
                        }
                    }
                    
                    ?>
                @endforeach
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    </div>
    </div>

    <main>
        <h1 style="text-align:center;">Featured Books</h1>
        <div class="centered-btn">
            <a class="btn btn-secondary" href="{{URL::to('/home')}}"
                style="color: white;font-size:16px;">Recommended</a>
            <a class="btn btn-light" href="{{URL::to('/home-popular')}}"
                style="color: black;font-size:16px;">Popular</a>
        </div>
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
                            @foreach($book_recommend as $key => $book_recommend_item)
                            <?php
                            if(is_null($book_recommend_item->book_cover_photo)){
                                $book_recommend_item->book_cover_photo = "book.jpg";
                            }
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $current_date = time();
                            $current_time = date("Y-m-d",$current_date);
                            ?>
                            <div class="col">
                                <div class="card h-100" style="width: 16rem;margin:auto;">
                                    <a href="{{URL::to('/book-detail-show-new/'.$book_recommend_item->id)}}"><img
                                            src="{{URL::to('book/'.$book_recommend_item->book_cover_photo)}}"
                                            class="card-img-top" alt="..."></a>
                                    <div class="card-body">
                                        <strong style="font-size:14px">{{$book_recommend_item->book_title}}</strong>
                                        <p class="card-text">{{$book_recommend_item->author_name}}</p>
                                    </div>
                                    <div class="card-footer">
                                        <?php
                                    if(is_null($book_recommend_item->discount_price)){
                                        echo '$'.$book_recommend_item->book_price;
                                    } else{
                                        if(is_null($book_recommend_item->discount_end_date) || (($current_time >= $book_recommend_item->discount_start_date)&& ($current_time <= $book_recommend_item->discount_end_date))){
                                            echo '<del>$'.$book_recommend_item->book_price.'</del> $'.$book_recommend_item->discount_price;
                                        } else {
                                            echo '$'.$book_recommend_item->book_price;
                                        }
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </main>

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