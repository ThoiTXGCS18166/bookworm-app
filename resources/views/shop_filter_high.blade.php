@extends('layout')
@section('content')

<!-- PRODUCT LIST -->
<div id="product-list" class="col">
    <div class="row" style="margin-right:20px;">
        <div class="col-12 col-sm-12 col-lg-8">
            <p class="product-category">Showing {{ $all_book->firstItem() }} - {{ $all_book->lastItem() }}
                of {{$all_book->total()}} books</p>
        </div>
        <div class="col-6 col-sm-6 col-lg-2">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Sort by price: high to low
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{URL::to('/shop')}}">Sort by on sale</a></li>
                    <li><a class="dropdown-item" href="{{URL::to('/shop-show-popularity')}}">Sort by popularity</a></li>
                    <li><a class="dropdown-item" href="{{URL::to('/shop-show-low')}}">Sort by price: low to high</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-2 col-lg-1">

        </div>
        <div class="col-4 col-sm-6 col-lg-1">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Show {{ $book_amount_per_page }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{URL::to('/shop-show-high')}}">Show 25</a></li>
                    <li><a class="dropdown-item" href="{{URL::to('/shop-show-high-20')}}">Show 20</a></li>
                    <li><a class="dropdown-item" href="{{URL::to('/shop-show-high-15')}}">Show 15</a></li>
                    <li><a class="dropdown-item" href="{{URL::to('/shop-show-high-5')}}">Show 5</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-4 g-4">
        @foreach($all_book as $key => $book)
        <?php
                if(is_null($book->book_cover_photo)){
                    $book->book_cover_photo = "book.jpg";
                }
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $current_date = time();
                $current_time = date("Y-m-d",$current_date);
            ?>
        <div class="col">
            <div class="card h-100" style="width: 16rem;margin:auto;">
                <a href="{{URL::to('/book-detail/'.$book->id)}}"><img
                        src="{{URL::to('book/'.$book->book_cover_photo)}}" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <strong style="font-size:14px">{{$book->book_title}}</strong>
                    <p class="card-text">{{$book->author_name}}</p>
                </div>
                <div class="card-footer">
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <div class="d-flex justify-content-center">
        {!! $all_book->links() !!}
    </div>
</div>

@endsection