<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BookController extends Controller
{
    public function index($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('id','desc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '20';
        return view('detail')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_old($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('review_date','asc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '20';
        return view('detail_old')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_new($book_id){
        $detail_book = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->join('categories','books.category_id','=','categories.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('review_date','desc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '20';
        return view('detail_new')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_star_review_sort($book_id, $star, $sort_type_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '20';

        if($sort_type_id == 1){
            $sort_type = 'Sort by date: newest to oldest';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('review_date','desc')->paginate(20);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by on sale';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('id','desc')->paginate(20);
        } else {
            $sort_type = 'Sort by date: oldest to newest';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('review_date','asc')->paginate(20);
        }

        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('number_of_review',$review_number);
    }

    public function index_show_star_review_sort_15($book_id,$star,$sort_type_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '15';

        if($sort_type_id == 1){
            $sort_type = 'Sort by date: newest to oldest';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('review_date','desc')->paginate(15);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by on sale';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('id','desc')->paginate(15);
        } else {
            $sort_type = 'Sort by date: oldest to newest';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('review_date','asc')->paginate(15);
        }

        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('number_of_review',$review_number);
    }

    public function index_show_star_review_sort_10($book_id,$star,$sort_type_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '10';

        if($sort_type_id == 1){
            $sort_type = 'Sort by date: newest to oldest';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('review_date','desc')->paginate(10);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by on sale';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('id','desc')->paginate(10);
        } else {
            $sort_type = 'Sort by date: oldest to newest';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('review_date','asc')->paginate(10);
        }

        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('number_of_review',$review_number);
    }

    public function index_show_star_review_sort_5($book_id,$star,$sort_type_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '5';

        if($sort_type_id == 1){
            $sort_type = 'Sort by date: newest to oldest';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('review_date','desc')->paginate(5);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by on sale';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('id','desc')->paginate(5);
        } else {
            $sort_type = 'Sort by date: oldest to newest';
            $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
            ->where('reviews.rating_start',$star)->orderBy('review_date','asc')->paginate(5);
        }

        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('number_of_review',$review_number);
    }

    public function index_show_star_5($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',5)->orderBy('review_date','desc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',5)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $sort_type = 'Sort by date: newest to oldest';
        $review_number = '20';
        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('number_of_review',$review_number);
    }

    public function index_show_star_4($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',4)->orderBy('review_date','desc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',4)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $sort_type = 'Sort by date: newest to oldest';
        $review_number = '20';
        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('number_of_review',$review_number);
    }

    public function index_show_star_3($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',3)->orderBy('review_date','desc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',3)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $sort_type = 'Sort by date: newest to oldest';
        $review_number = '20';
        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('number_of_review',$review_number);
    }

    public function index_show_star_2($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',2)->orderBy('review_date','desc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',2)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $sort_type = 'Sort by date: newest to oldest';
        $review_number = '20';
        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('number_of_review',$review_number);
    }

    public function index_show_star_1($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',1)->orderBy('review_date','desc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',1)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $sort_type = 'Sort by date: newest to oldest';
        $review_number = '20';
        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('number_of_review',$review_number);;
    }

    public function index_show_15($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('id','desc')->paginate(15);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(15);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(15);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(15);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(15);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(15);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '15';
        return view('detail')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_old_15($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('review_date','asc')->paginate(15);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '15';
        return view('detail_old')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_new_15($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('review_date','desc')->paginate(15);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '15';
        return view('detail_new')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_10($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('id','desc')->paginate(10);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(10);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(10);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(10);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(10);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(10);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '10';
        return view('detail')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_old_10($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('review_date','asc')->paginate(10);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '10';
        return view('detail_old')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_new_10($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('review_date','desc')->paginate(10);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '10';
        return view('detail_new')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_5($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('id','desc')->paginate(5);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(5);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(5);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(5);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(5);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(5);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '5';
        return view('detail')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_old_5($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('review_date','asc')->paginate(5);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '5';
        return view('detail_old')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function index_show_new_5($book_id){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)->orderBy('review_date','desc')->paginate(5);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $review_number = '5';
        return view('detail_new')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('last_review',$last_review)
        ->with('number_of_review',$review_number);
    }

    public function filter_category($category_id){
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
        end) AS final_price')
        ->orderBy('final_price','asc')->where('books.category_id',$category_id)->paginate(25);

        $filter_category = DB::table('books')->where('books.category_id',$category_id)->limit(1)->get();

        $category_number = DB::table('categories')->where('categories.id',$category_id)->limit(1)->get();
        $sort_type = 'Sort by on sale';
        return view('shop_filter_category')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('category_number',$category_number)->with('sort_type',$sort_type)
        ->with('filter_category',$filter_category)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_category_by_sort($category_id, $sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
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
            end) AS final_price')
            ->orderBy('final_price','asc')->where('books.category_id',$category_id)->paginate(25);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
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
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.category_id',$category_id)->paginate(25);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
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
            ->where('books.category_id',$category_id)->orderBy('final_price','asc')->paginate(25);
        } else {
            $sort_type = 'Sort by price: high to low';
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
            ->where('books.category_id',$category_id)->orderBy('final_price','desc')->paginate(25);
        }

        $filter_category = DB::table('books')->where('books.category_id',$category_id)->limit(1)->get();

        $category_number = DB::table('categories')->where('categories.id',$category_id)->limit(1)->get();

        return view('shop_filter_category')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('category_number',$category_number)->with('sort_type',$sort_type)
        ->with('filter_category',$filter_category)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_category_by_sort_20($category_id, $sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
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
            end) AS final_price')
            ->orderBy('final_price','asc')->where('books.category_id',$category_id)->paginate(20);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
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
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.category_id',$category_id)->paginate(20);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
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
            ->where('books.category_id',$category_id)->orderBy('final_price','asc')->paginate(20);
        } else {
            $sort_type = 'Sort by price: high to low';
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
            ->where('books.category_id',$category_id)->orderBy('final_price','desc')->paginate(20);
        }

        $filter_category = DB::table('books')->where('books.category_id',$category_id)->limit(1)->get();

        $category_number = DB::table('categories')->where('categories.id',$category_id)->limit(1)->get();

        return view('shop_filter_category')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('category_number',$category_number)->with('sort_type',$sort_type)
        ->with('filter_category',$filter_category)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_category_by_sort_15($category_id, $sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
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
            end) AS final_price')
            ->orderBy('final_price','asc')->where('books.category_id',$category_id)->paginate(15);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
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
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.category_id',$category_id)->paginate(15);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
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
            ->where('books.category_id',$category_id)->orderBy('final_price','asc')->paginate(15);
        } else {
            $sort_type = 'Sort by price: high to low';
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
            ->where('books.category_id',$category_id)->orderBy('final_price','desc')->paginate(15);
        }

        $filter_category = DB::table('books')->where('books.category_id',$category_id)->limit(1)->get();

        $category_number = DB::table('categories')->where('categories.id',$category_id)->limit(1)->get();

        return view('shop_filter_category')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('category_number',$category_number)->with('sort_type',$sort_type)
        ->with('filter_category',$filter_category)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_category_by_sort_5($category_id, $sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
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
            end) AS final_price')
            ->orderBy('final_price','asc')->where('books.category_id',$category_id)->paginate(5);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
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
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.category_id',$category_id)->paginate(5);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
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
            ->where('books.category_id',$category_id)->orderBy('final_price','asc')->paginate(5);
        } else {
            $sort_type = 'Sort by price: high to low';
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
            ->where('books.category_id',$category_id)->orderBy('final_price','desc')->paginate(5);
        }

        $filter_category = DB::table('books')->where('books.category_id',$category_id)->limit(1)->get();

        $category_number = DB::table('categories')->where('categories.id',$category_id)->limit(1)->get();

        return view('shop_filter_category')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('category_number',$category_number)->with('sort_type',$sort_type)
        ->with('filter_category',$filter_category)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_category_high($category_id){
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
        ->where('books.category_id',$category_id)->orderBy('final_price','asc')->paginate(25);

        $filter_category = DB::table('books')->where('books.category_id',$category_id)->limit(1)->get();

        $category_number = DB::table('categories')->where('categories.id',$category_id)->limit(1)->get();
        $sort_type = 'Sort by price: low to high';
        return view('shop_filter_category')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('category_number',$category_number)->with('sort_type',$sort_type)
        ->with('filter_category',$filter_category)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_category_low($category_id){
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
        ->where('books.category_id',$category_id)->orderBy('final_price','desc')->paginate(25);

        $filter_category = DB::table('books')->where('books.category_id',$category_id)->limit(1)->get();

        $category_number = DB::table('categories')->where('categories.id',$category_id)->limit(1)->get();
        $sort_type = 'Sort by price: high to low';
        return view('shop_filter_category')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('category_number',$category_number)->with('sort_type',$sort_type)
        ->with('filter_category',$filter_category)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_category_popularity($category_id){
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
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.category_id',$category_id)->paginate(25);

        $filter_category = DB::table('books')->where('books.category_id',$category_id)->limit(1)->get();

        $category_number = DB::table('categories')->where('categories.id',$category_id)->limit(1)->get();
        $sort_type = 'Sort by popularity';
        return view('shop_filter_category')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('category_number',$category_number)->with('sort_type',$sort_type)
        ->with('filter_category',$filter_category)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_author($author_id){
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
        end) AS final_price')
        ->orderBy('final_price','asc')
        ->where('books.author_id',$author_id)->paginate(25);

        $filter_author = DB::table('books')->where('books.author_id',$author_id)->limit(1)->get();

        $sort_type = 'Sort by on sale';

        $author_number = DB::table('authors')->where('authors.id',$author_id)->limit(1)->get();
        return view('shop_filter_author')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('author_number',$author_number)->with('sort_type',$sort_type)
        ->with('filter_author',$filter_author)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_author_by_sort($author_id, $sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
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
            end) AS final_price')
            ->orderBy('final_price','asc')
            ->where('books.author_id',$author_id)->paginate(25);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
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
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.author_id',$author_id)->paginate(25);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
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
            ->where('books.author_id',$author_id)->orderBy('final_price','asc')->paginate(25);
        } else {
            $sort_type = 'Sort by price: high to low';
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
            ->where('books.author_id',$author_id)->orderBy('final_price','desc')->paginate(25);
        }

        $filter_author = DB::table('books')->where('books.author_id',$author_id)->limit(1)->get();
        $author_number = DB::table('authors')->where('authors.id',$author_id)->limit(1)->get();
        return view('shop_filter_author')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('author_number',$author_number)->with('sort_type',$sort_type)
        ->with('filter_author',$filter_author)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_author_by_sort_20($author_id, $sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
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
            end) AS final_price')
            ->orderBy('final_price','asc')
            ->where('books.author_id',$author_id)->paginate(20);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
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
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.author_id',$author_id)->paginate(20);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
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
            ->where('books.author_id',$author_id)->orderBy('final_price','asc')->paginate(20);
        } else {
            $sort_type = 'Sort by price: high to low';
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
            ->where('books.author_id',$author_id)->orderBy('final_price','desc')->paginate(20);
        }

        $filter_author = DB::table('books')->where('books.author_id',$author_id)->limit(1)->get();
        $author_number = DB::table('authors')->where('authors.id',$author_id)->limit(1)->get();
        return view('shop_filter_author')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('author_number',$author_number)->with('sort_type',$sort_type)
        ->with('filter_author',$filter_author)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_author_by_sort_15($author_id, $sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
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
            end) AS final_price')
            ->orderBy('final_price','asc')
            ->where('books.author_id',$author_id)->paginate(15);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
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
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.author_id',$author_id)->paginate(15);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
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
            ->where('books.author_id',$author_id)->orderBy('final_price','asc')->paginate(15);
        } else {
            $sort_type = 'Sort by price: high to low';
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
            ->where('books.author_id',$author_id)->orderBy('final_price','desc')->paginate(15);
        }

        $filter_author = DB::table('books')->where('books.author_id',$author_id)->limit(1)->get();
        $author_number = DB::table('authors')->where('authors.id',$author_id)->limit(1)->get();
        return view('shop_filter_author')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('author_number',$author_number)->with('sort_type',$sort_type)
        ->with('filter_author',$filter_author)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_author_by_sort_5($author_id, $sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
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
            end) AS final_price')
            ->orderBy('final_price','asc')
            ->where('books.author_id',$author_id)->paginate(5);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
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
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.author_id',$author_id)->paginate(5);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
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
            ->where('books.author_id',$author_id)->orderBy('final_price','asc')->paginate(5);
        } else {
            $sort_type = 'Sort by price: high to low';
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
            ->where('books.author_id',$author_id)->orderBy('final_price','desc')->paginate(5);
        }

        $filter_author = DB::table('books')->where('books.author_id',$author_id)->limit(1)->get();
        $author_number = DB::table('authors')->where('authors.id',$author_id)->limit(1)->get();
        return view('shop_filter_author')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('author_number',$author_number)->with('sort_type',$sort_type)
        ->with('filter_author',$filter_author)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_author_high($author_id){
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
        ->where('books.author_id',$author_id)->orderBy('final_price','asc')->paginate(25);

        $filter_author = DB::table('books')->where('books.author_id',$author_id)->limit(1)->get();

        $sort_type = 'Sort by price: low to high';

        $author_number = DB::table('authors')->where('authors.id',$author_id)->limit(1)->get();
        return view('shop_filter_author')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('author_number',$author_number)->with('sort_type',$sort_type)
        ->with('filter_author',$filter_author)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_author_low($author_id){
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
        ->where('books.author_id',$author_id)->orderBy('final_price','desc')->paginate(25);

        $filter_author = DB::table('books')->where('books.author_id',$author_id)->limit(1)->get();

        $sort_type = 'Sort by price: high to low';

        $author_number = DB::table('authors')->where('authors.id',$author_id)->limit(1)->get();
        return view('shop_filter_author')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('author_number',$author_number)->with('sort_type',$sort_type)
        ->with('filter_author',$filter_author)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_author_popularity($author_id){
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
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->where('books.author_id',$author_id)->paginate(25);

        $filter_author = DB::table('books')->where('books.author_id',$author_id)->limit(1)->get();

        $sort_type = 'Sort by popularity';

        $author_number = DB::table('authors')->where('authors.id',$author_id)->limit(1)->get();
        return view('shop_filter_author')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('author_number',$author_number)->with('sort_type',$sort_type)
        ->with('filter_author',$filter_author)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_1_star(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price')
        ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->havingRaw('AVG(reviews.rating_start) >=?',[1])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by on sale';
        return view('shop_filter_star_1')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_1_star_by_sort($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','asc')->paginate(25);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','asc')->paginate(25);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','desc')->paginate(25);
        }

        return view('shop_filter_star_1')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_1_star_by_sort_20($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','asc')->paginate(20);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(20);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','asc')->paginate(20);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','desc')->paginate(20);
        }

        return view('shop_filter_star_1')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_1_star_by_sort_15($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','asc')->paginate(15);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(15);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','asc')->paginate(15);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','desc')->paginate(15);
        }

        return view('shop_filter_star_1')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_1_star_by_sort_5($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','asc')->paginate(5);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(5);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','asc')->paginate(5);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[1])
            ->orderBy('final_price','desc')->paginate(5);
        }

        return view('shop_filter_star_1')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_1_star_popularity(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[1])
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);

        $sort_type = 'Sort by popularity';
        return view('shop_filter_star_1')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_1_star_high(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[1])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by price: low to high';
        return view('shop_filter_star_1')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_1_star_low(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[1])
        ->orderBy('final_price','desc')->paginate(25);

        $sort_type = 'Sort by price: high to low';
        return view('shop_filter_star_1')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_2_star(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price')
        ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->havingRaw('AVG(reviews.rating_start) >=?',[2])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by on sale';
        return view('shop_filter_star_2')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_2_star_by_sort($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','asc')->paginate(25);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','asc')->paginate(25);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','desc')->paginate(25);
        }

        return view('shop_filter_star_2')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_2_star_by_sort_20($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','asc')->paginate(20);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(20);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','asc')->paginate(20);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','desc')->paginate(20);
        }

        return view('shop_filter_star_2')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_2_star_by_sort_15($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','asc')->paginate(15);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(15);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','asc')->paginate(15);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','desc')->paginate(15);
        }

        return view('shop_filter_star_2')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_2_star_by_sort_5($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','asc')->paginate(5);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(5);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','asc')->paginate(5);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[2])
            ->orderBy('final_price','desc')->paginate(5);
        }

        return view('shop_filter_star_2')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_2_star_popularity(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[2])
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);

        $sort_type = 'Sort by popularity';
        return view('shop_filter_star_2')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_2_star_high(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[2])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by price: low to high';
        return view('shop_filter_star_2')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_2_star_low(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[2])
        ->orderBy('final_price','desc')->paginate(25);

        $sort_type = 'Sort by price: high to low';
        return view('shop_filter_star_2')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_3_star(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price')
        ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->havingRaw('AVG(reviews.rating_start) >=?',[3])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by on sale';
        return view('shop_filter_star_3')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_3_star_by_sort($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','asc')->paginate(25);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','asc')->paginate(25);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','desc')->paginate(25);
        }

        return view('shop_filter_star_3')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_3_star_by_sort_20($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','asc')->paginate(20);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(20);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','asc')->paginate(20);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','desc')->paginate(20);
        }

        return view('shop_filter_star_3')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_3_star_by_sort_15($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','asc')->paginate(15);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(15);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','asc')->paginate(15);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','desc')->paginate(15);
        }

        return view('shop_filter_star_3')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_3_star_by_sort_5($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','asc')->paginate(5);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(5);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','asc')->paginate(5);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[3])
            ->orderBy('final_price','desc')->paginate(5);
        }

        return view('shop_filter_star_3')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_3_star_popularity(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[3])
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);

        $sort_type = 'Sort by popularity';
        return view('shop_filter_star_3')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_3_star_high(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[3])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by price: low to high';
        return view('shop_filter_star_3')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_3_star_low(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[3])
        ->orderBy('final_price','desc')->paginate(25);

        $sort_type = 'Sort by price: high to low';
        return view('shop_filter_star_3')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_4_star(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price')
        ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->havingRaw('AVG(reviews.rating_start) >=?',[4])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by on sale';
        return view('shop_filter_star_4')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_4_star_by_sort($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','asc')->paginate(25);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','asc')->paginate(25);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','desc')->paginate(25);
        }

        return view('shop_filter_star_4')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_4_star_by_sort_20($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','asc')->paginate(20);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(20);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','asc')->paginate(20);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','desc')->paginate(20);
        }

        return view('shop_filter_star_4')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_4_star_by_sort_15($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','asc')->paginate(15);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(15);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','asc')->paginate(15);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','desc')->paginate(15);
        }

        return view('shop_filter_star_4')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_4_star_by_sort_5($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','asc')->paginate(5);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(5);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','asc')->paginate(5);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) >=?',[4])
            ->orderBy('final_price','desc')->paginate(5);
        }

        return view('shop_filter_star_4')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_4_star_popularity(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[4])
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);

        $sort_type = 'Sort by popularity';
        return view('shop_filter_star_4')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_4_star_high(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[4])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by price: low to high';
        return view('shop_filter_star_4')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_4_star_low(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) >=?',[4])
        ->orderBy('final_price','desc')->paginate(25);

        $sort_type = 'Sort by price: high to low';
        return view('shop_filter_star_4')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_5_star(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
        (CASE 
        WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
        or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
        THEN concat(discounts.discount_price)
        ELSE concat(books.book_price)
        end) AS final_price')
        ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->havingRaw('AVG(reviews.rating_start) =?',[5])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by on sale';
        return view('shop_filter_star_5')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_5_star_by_sort($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','asc')->paginate(25);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','asc')->paginate(25);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','desc')->paginate(25);
        }

        return view('shop_filter_star_5')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_5_star_by_sort_20($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 20;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','asc')->paginate(20);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(20);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','asc')->paginate(20);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','desc')->paginate(20);
        }

        return view('shop_filter_star_5')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_5_star_by_sort_15($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 15;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','asc')->paginate(15);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(15);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','asc')->paginate(15);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','desc')->paginate(15);
        }

        return view('shop_filter_star_5')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_5_star_by_sort_5($sort_type_id){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 5;

        if($sort_type_id == 1){
            $sort_type = 'Sort by on sale';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
            ->select('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->selectRaw('AVG(reviews.rating_start) AS average_rating, 
            (CASE 
            WHEN ((discounts.discount_start_date <= now() and discounts.discount_end_date >= now())
            or (discounts.discount_start_date <= now() and discounts.discount_end_date is null)) 
            THEN concat(discounts.discount_price)
            ELSE concat(books.book_price)
            end) AS final_price')
            ->groupBy('books.id','books.book_title','authors.author_name','books.book_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','asc')->paginate(5);
        } elseif($sort_type_id == 2){
            $sort_type = 'Sort by popularity';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(5);
        } elseif($sort_type_id == 3){
            $sort_type = 'Sort by price: low to high';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','asc')->paginate(5);
        } else {
            $sort_type = 'Sort by price: high to low';
            $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
            ->join('reviews','books.id','=','reviews.book_id')
            ->leftJoin('discounts','books.id','=','discounts.book_id')
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
            ->havingRaw('AVG(reviews.rating_start) =?',[5])
            ->orderBy('final_price','desc')->paginate(5);
        }

        return view('shop_filter_star_5')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_5_star_popularity(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) =?',[5])
        ->orderBy('total_review','desc')->orderBy('final_price','asc')->orderBy('books.id','asc')->paginate(25);

        $sort_type = 'Sort by popularity';
        return view('shop_filter_star_5')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_5_star_high(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) =?',[5])
        ->orderBy('final_price','asc')->paginate(25);

        $sort_type = 'Sort by price: low to high';
        return view('shop_filter_star_5')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function filter_5_star_low(){
        $category_book = DB::table('categories')->orderBy('category_name','asc')->limit(5)->get();
        $author_book = DB::table('authors')->orderBy('author_name','asc')->limit(10)->get();
        $book_amount_per_page = 25;

        $all_book = DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->join('reviews','books.id','=','reviews.book_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
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
        ->havingRaw('AVG(reviews.rating_start) =?',[5])
        ->orderBy('final_price','desc')->paginate(25);

        $sort_type = 'Sort by price: high to low';
        return view('shop_filter_star_5')->with('category',$category_book)->with('author',$author_book)
        ->with('all_book',$all_book)->with('sort_type',$sort_type)->with('book_amount_per_page', $book_amount_per_page);
    }

    public function add_book_review(Request $request, $book_id){
        $data = array();
        $data['id'] = $request->book_review_id;
        $data['book_id'] = $book_id;
        $data['review_title'] = $request->book_review_title;
        $data['review_details'] = $request->book_review_detail;
        $data['review_date'] = $request->book_review_date;
        $data['rating_start'] = $request->book_rating_star;

        DB::table('reviews')->insert($data);
        return '<script type="text/javascript">
        alert("A new book review is added successfully!");
        setTimeout(function(){ window.location.replace("/book-detail-show-new/'.$book_id.'"); }, 1000);
        </script>';
    }

    public function index_show_star_review($book_id, $star_number){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star_number)->orderBy('id','desc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star_number)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $sort_type = 'Sort by on sale';
        $sort_id = 3;
        $review_number = '20';
        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('sort_id',$sort_id)->with('number_of_review',$review_number);
    }

    public function index_show_star_review_old($book_id, $star_number){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star_number)->orderBy('review_date','asc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star_number)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $sort_type = 'Sort by date: oldest to newest';
        $sort_id = 2;
        $review_number = '20';
        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('sort_id',$sort_id)->with('number_of_review',$review_number);
    }

    public function index_show_star_review_new($book_id, $star_number){
        $detail_book = DB::table('books')
        ->join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->where('books.id',$book_id)
        ->select('books.id', 'books.book_cover_photo', 'categories.category_name', 'authors.author_name', 'books.book_summary', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->get();
        $review_book = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star_number)->orderBy('review_date','desc')->paginate(20);
        $review_book_5 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',5)
        ->orderBy('id','desc')->paginate(20);
        $review_book_4 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',4)
        ->orderBy('id','desc')->paginate(20);
        $review_book_3 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',3)
        ->orderBy('id','desc')->paginate(20);
        $review_book_2 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',2)
        ->orderBy('id','desc')->paginate(20);
        $review_book_1 = DB::table('reviews')->where('reviews.book_id',$book_id)->where('reviews.rating_start',1)
        ->orderBy('id','desc')->paginate(20);
        $star_number = DB::table('reviews')->where('reviews.book_id',$book_id)
        ->where('reviews.rating_start',$star_number)->limit(1)->get();
        $last_review = DB::table('reviews')->orderby('id','desc')->limit(1)->get();
        $sort_type = 'Sort by date: newest to oldest';
        $sort_id = 1;
        $review_number = '20';
        return view('detail_star')->with('book_detail',$detail_book)->with('book_review',$review_book)
        ->with('book_review_5',$review_book_5)->with('book_review_4',$review_book_4)
        ->with('book_review_3',$review_book_3)->with('book_review_2',$review_book_2)
        ->with('book_review_1',$review_book_1)->with('star_number',$star_number)->with('last_review',$last_review)
        ->with('sort_type',$sort_type)->with('sort_id',$sort_id)->with('number_of_review',$review_number);
    }
}