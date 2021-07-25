<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Bookworm Book Detail Page</title>
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
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="/frontend/images/logo.png" height="32"
                    width="32" alt="">
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
                    <a class="nav-link" href="{{URL::to('/shop')}}"><u>Shop</u></a>
                    <a class="nav-link" href="{{URL::to('/about')}}">About</a>
                    <a class="nav-link" href="{{URL::to('/show-cart')}}">Cart(<?php echo $cart_number;?>)</a>
                </form>
            </div>
        </div>
    </nav>

    @foreach($book_detail as $key => $book)
    <?php
        if(is_null($book->book_cover_photo)){
             $book->book_cover_photo = "book.jpg";
        } else {
            $book->book_cover_photo = $book->book_cover_photo;
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_date = time();
        $current_time = date("Y-m-d",$current_date);
    ?>
    <h1 style="margin-top:25px;margin-left:50px;margin-bottom:25px;">Category Name: {{$book->category_name}}</h1>
    <hr style="margin-left:50px;margin-right:25px;margin-bottom:10px;">

    <div class="container-fluid">
        <div class="row">
            <!-- PRODUCT LIST -->
            <div id="product-list" class="col">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="card mb-3" style="max-width:1200px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{URL::to('book/'.$book->book_cover_photo)}}"
                                        style="width:100%;height:auto;" class="img-fluid rounded-start" alt="...">
                                    <br>
                                    <p style="margin-right:25px;text-align:right;margin-top:10px;">By (author) <strong
                                            style="font-size:20px;">{{$book->author_name}}</strong></p>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$book->book_title}}</h5>
                                        <p class="card-text">Book description.<br>{{$book->book_summary}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card">
                            <h5 class="card-header">
                            <?php
                            if(is_null($book->discount_price)){
                                echo '$'.$book->book_price;
                            } else{
                                if(is_null($book->discount_end_date) || (($current_time >= $book->discount_start_date)&& ($current_time <= $book->discount_end_date))){
                                    echo '<del>$'.$book->book_price.'</del> $'.$book->discount_price;
                                } else {
                                    echo '$'.$book->book_price;
                                }
                            }
                            ?>
                            </h5>
                            <div class="card-body">
                                <form action="{{URL::to('/save-cart')}}" method="post">
                                    {{ csrf_field() }}
                                    <p class="card-text">Quantity</p>
                                    <div class="number-container" style="width:100%">
                                        <input name="qty" type="number" min="1" value="1" max="8" step="1" />
                                        <input name="bookid_hidden" type="hidden" value="{{$book->id}}" />
                                    </div>
                                    <div class="buttonHolder">
                                        <button type="submit" name="add_to_cart" style="width: 100%;"
                                            class="btn btn-primary">Add to cart</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <?php
                    if($book_review_5->total() == 0 && $book_review_4->total() == 0 && $book_review_3->total() == 0 && $book_review_2->total() == 0 && $book_review_1->total() == 0){
                        $average = 0;
                    } else {
                        $sum = $book_review_5->total() * 5 + $book_review_4->total() * 4 + $book_review_3->total() * 3 + $book_review_2->total() * 2 + $book_review_1->total();
                        $total = $book_review_5->total() + $book_review_4->total() + $book_review_3->total() + $book_review_2->total() + $book_review_1->total();
                        $average = number_format($sum/$total, 2);
                    }
                ?>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="shadow-none p-3 mb-5 bg-light rounded">
                            <p><strong style="font-size:20px;">Customer Reviews</strong> (Filtered by )</p>
                            <h1>{{$average}} Star</h1>
                            <div class="row">
                                <div class="col-12 col-sm-2 col-lg-1">
                                    <p><a
                                            href="{{URL::to('/book-detail-show-old/'.$book->id)}}"><u><strong>(All)</strong></u></a>
                                    </p>
                                </div>
                                <div class="col-12 col-sm-10 col-lg-11">
                                    <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a
                                                    href="{{URL::to('/book-detail-show-star-5/'.$book->id)}}"><u>5 star
                                                        ({{$book_review_5->total()}})</u></a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="{{URL::to('/book-detail-show-star-4/'.$book->id)}}"><u>4 star
                                                        ({{$book_review_4->total()}})</u></a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="{{URL::to('/book-detail-show-star-3/'.$book->id)}}"><u>3 star
                                                        ({{$book_review_3->total()}})</u></a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="{{URL::to('/book-detail-show-star-2/'.$book->id)}}"><u>2 star
                                                        ({{$book_review_2->total()}})</u></a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="{{URL::to('/book-detail-show-star-1/'.$book->id)}}"><u>1 star
                                                        ({{$book_review_1->total()}})</u></a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-5 col-lg-6">
                                    <p class="product-category">Showing {{ $book_review->firstItem() }} -
                                        {{ $book_review->lastItem() }}
                                        of {{$book_review->total()}} reviews</p>
                                </div>
                                <div class="col col-sm-3 col-lg-3">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Sort by date: oldest to newest
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item"
                                                    href="{{URL::to('/book-detail/'.$book->id)}}">Sort by on sale</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{URL::to('/book-detail-show-new/'.$book->id)}}">Sort by date:
                                                    newest to oldest</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-lg-1">

                                </div>
                                <div class="col col-sm-1 col-lg-1">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Show {{ $number_of_review }}
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item"
                                                    href="{{URL::to('/book-detail-show-old/'.$book->id)}}">Show 20</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{URL::to('/book-detail-show-old-15/'.$book->id)}}">Show
                                                    15</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{URL::to('/book-detail-show-old-10/'.$book->id)}}">Show
                                                    10</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{URL::to('/book-detail-show-old-5/'.$book->id)}}">Show 5</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-1 col-lg-1">

                                </div>
                            </div>
                            <br>
                            @foreach($book_review as $key => $review)
                            <p><strong style="font-size:20px;">{{$review->review_title}}</strong> |
                                {{$review->rating_start}} star</p>
                            <p>{{$review->review_details}}</p>
                            <?php
                                $time = new DateTime($review->review_date);
                                $date = date_format($time, 'F d, Y');
                            ?>
                            <p>{{$date}}</p>
                            <hr>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                {!! $book_review->links() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card" style="width: 100%;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h3>Write a Review</h3>
                                </li>
                                @foreach($last_review as $key => $last_book_review)
                                <?php
                                    $new_review_id = ($last_book_review->id) + 1;
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $book_review_date = time();
                                    $book_review_time = date("Y-m-d H:i:s",$book_review_date)
                                ?>
                                @endforeach
                                <li class="list-group-item">
                                    <form role="form" action="{{URL::to('/add-book-review/'.$book->id)}}" method="post">
                                        {{ csrf_field() }}
                                        <p>Add a title</p>
                                        <input type="hidden" name="book_review_id" class="form-control"
                                            id="exampleInputTitle" value="{{$new_review_id}}">
                                        <input type="text" name="book_review_title" maxlength="120" required class="form-control"
                                            id="exampleInputTitle">
                                        <br>
                                        <p>Details please! Your review helps other shopper</p>
                                        <textarea id="w3review" name="book_review_detail" cols="120" rows="3"
                                            style="max-width:100%;"></textarea>
                                        <br>
                                        <p>Select a rating star</p>
                                        <select class="form-select" name="book_rating_star" required
                                            aria-label="Default select example">
                                            <option selected value="">Choose the rating star</option>
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Star</option>
                                            <option value="3">3 Star</option>
                                            <option value="4">4 Star</option>
                                            <option value="5">5 Star</option>
                                        </select>
                                        <br>
                                        <input type="hidden" name="book_review_date" class="form-control"
                                            value="{{$book_review_time}}" id="exampleInputTitle">

                                </li>
                                <li class="list-group-item">
                                    <div class="buttonHolder">
                                        <button type="submit" name="add_book_review" style="width: 100%;"
                                            class="btn btn-primary">Submit Review</button>
                                    </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach

    <footer>
        <div class="footer-content">
            <img src="/frontend/images/logo.png" height="64" width="64" alt="">
            <h7>BOOKWORM</h7>
            <p>Address</p>
            <p>Phone</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/bootstrap-input-spinner.js') }}"></script>
    <script>
    $("input[type='number']").inputSpinner();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>