@extends('filter_layout')
@section('filter_content')

@foreach($category_number as $key => $number)
<p style="margin-top:25px;margin-left:50px;margin-bottom:25px;"><strong style="font-size:20px;">Books</strong>
    (Filtered by Category #{{$number->id}})</p>
<hr style="margin-left:50px;margin-right:25px;margin-bottom:0px;">
@endforeach

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
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                Category
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
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
                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseTwo">
                                Author
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingTwo">
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
                                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseThree">
                                Rating Review
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingThree">
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
                            {{ $sort_type }}
                            <?php
                            if($sort_type == 'Sort by on sale'){
                                $sort_type_id = 1;
                            } elseif($sort_type == 'Sort by popularity'){
                                $sort_type_id = 2;
                            } elseif($sort_type == 'Sort by price: low to high'){
                                $sort_type_id = 3;
                            } else {
                                $sort_type_id = 4;
                            }
                            ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach($filter_category as $key => $book_filter_category)
                            <li><a class="dropdown-item"
                                    href="{{URL::to('/book-category/'.$book_filter_category->category_id)}}">Sort
                                    by on sale </a>
                            </li>
                            @endforeach
                            <li><a class="dropdown-item"
                                    href="{{URL::to('/book-category-show-popularity/'.$book_filter_category->category_id)}}">Sort
                                    by popularity</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{URL::to('/book-category-show-high/'.$book_filter_category->category_id)}}">Sort
                                    by price: low to high </a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{URL::to('/book-category-show-low/'.$book_filter_category->category_id)}}">Sort
                                    by date: high to low </a>
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
                            @foreach($category_number as $key => $number)
                            <li><a class="dropdown-item"
                                    href="{{URL::to('/book-category/'.$number->id.'/'.$sort_type_id)}}">Show 25</a></li>
                            <li><a class="dropdown-item"
                                    href="{{URL::to('/book-category-show-20/'.$number->id.'/'.$sort_type_id)}}">Show
                                    20</a></li>
                            <li><a class="dropdown-item"
                                    href="{{URL::to('/book-category-show-15/'.$number->id.'/'.$sort_type_id)}}">Show
                                    15</a></li>
                            <li><a class="dropdown-item"
                                    href="{{URL::to('/book-category-show-5/'.$number->id.'/'.$sort_type_id)}}">Show
                                    5</a></li>
                            @endforeach
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

    </div>
</div>

@endsection