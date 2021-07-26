<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ShopController extends Controller
{
    public function index(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->join('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('books.book_price - discounts.discount_price AS sub_price,
        (CASE 
        WHEN (discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null) THEN 1
        ELSE 0
        end) AS state, 
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price')
        ->whereRaw('(discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)')
        ->orderBy('sub_price','desc')->orderBy('final_price','asc')
        ->paginate(25);
        return view('shop')->with('category',$category_book)->with('author',$author_book)->with('all_book',$all_book)
        ->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_15(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->join('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('books.book_price - discounts.discount_price AS sub_price,
        (CASE 
        WHEN (discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null) THEN 1
        ELSE 0
        end) AS state, 
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price')
        ->whereRaw('(discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)')
        ->orderBy('sub_price','desc')->orderBy('final_price','asc')
        ->paginate(15);
        return view('shop')->with('category',$category_book)->with('author',$author_book)->with('all_book',$all_book)
        ->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_20(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->join('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('books.book_price - discounts.discount_price AS sub_price,
        (CASE 
        WHEN (discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null) THEN 1
        ELSE 0
        end) AS state, 
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price')
        ->whereRaw('(discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)')
        ->orderBy('sub_price','desc')->orderBy('final_price','asc')
        ->paginate(20);
        return view('shop')->with('category',$category_book)->with('author',$author_book)->with('all_book',$all_book)
        ->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_5(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->join('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('books.book_price - discounts.discount_price AS sub_price,
        (CASE 
        WHEN (discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null) THEN 1
        ELSE 0
        end) AS state, 
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price')
        ->whereRaw('(discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)')
        ->orderBy('sub_price','desc')->orderBy('final_price','asc')
        ->paginate(5);
        return view('shop')->with('category',$category_book)->with('author',$author_book)->with('all_book',$all_book)
        ->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_low(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->orderBy('final_price','asc')->paginate(25);
        return view('shop_filter_low')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_low_15(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->orderBy('final_price','asc')->paginate(15);
        return view('shop_filter_low')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_low_20(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->orderBy('final_price','asc')->paginate(20);
        return view('shop_filter_low')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_low_5(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->orderBy('final_price','asc')->paginate(5);
        return view('shop_filter_low')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_high(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->orderBy('final_price','desc')->paginate(25);
        return view('shop_filter_high')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_high_15(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->orderBy('final_price','desc')->paginate(15);
        return view('shop_filter_high')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_high_20(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->orderBy('final_price','desc')->paginate(20);
        return view('shop_filter_high')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_high_5(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;
        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->orderBy('final_price','desc')->paginate(5);
        return view('shop_filter_high')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_popularity(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('COUNT(reviews.book_id) AS total_review,
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);

        return view('shop_filter_popularity')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_popularity_15(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;

        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('COUNT(reviews.book_id) AS total_review,
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(15);

        return view('shop_filter_popularity')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_popularity_20(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;

        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('COUNT(reviews.book_id) AS total_review,
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(20);

        return view('shop_filter_popularity')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function index_show_popularity_5(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;

        $all_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('COUNT(reviews.book_id) AS total_review,
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price, (CASE
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN 1
        ELSE 0
        end) AS state')
        ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(5);

        return view('shop_filter_popularity')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('book_amount_per_page', $book_amount_per_page);
    }
}
