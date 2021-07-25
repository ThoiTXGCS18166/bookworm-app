<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{   
    public function index_show_react(){
        return view('bookworm');
    }
    
    public function index(){
        $sale_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->join('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('books.book_price - discounts.discount_price AS sub_price,
        (CASE 
        WHEN (discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null) THEN 1
        ELSE 0
        end) AS state')
        ->whereRaw('(discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)')
        ->orderBy('sub_price','desc')
        ->limit(10)->get();

        $recommend_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
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
        ->orderBy('average_rating','desc')->orderBy('final_price','asc')
        ->limit(8)->get();

        return view('home')->with('book_sale',$sale_book)->with('book_recommend',$recommend_book);
    }

    public function index_show_popular(){
        $sale_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->join('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('books.book_price - discounts.discount_price AS sub_price,
        (CASE 
        WHEN (discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null) THEN 1
        ELSE 0
        end) AS state')
        ->whereRaw('(discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)')
        ->orderBy('sub_price','desc')
        ->limit(10)->get();
        
        $popular_book = DB::table('books')
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
        ->orderBy('total_review','desc')->orderBy('final_price','asc')
        ->limit(8)->get();

        return view('home_popular')->with('book_sale',$sale_book)->with('book_popular',$popular_book);
    }

    public function show_about(){
        return view('about');
    }
}