<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        $bookId = $request->bookid_hidden;
        $quantity = $request->qty;

        $book_info = DB::table('books')
        ->join('authors','books.author_id','=','authors.id')
        ->leftJoin('discounts','books.id','=','discounts.book_id')
        ->select('books.id', 'books.book_cover_photo', 'authors.author_name', 'books.book_price', 'books.book_title','discounts.discount_start_date','discounts.discount_end_date','discounts.discount_price')
        ->where('books.id',$bookId)->first();

        $data['id'] = $book_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $book_info->book_title;
        $data['price'] = $book_info->book_price;
        $data['weight'] = $book_info->book_price;
        $data['options']['image'] = $book_info->book_cover_photo;
        $data['options']['author'] = $book_info->author_name;
        $data['options']['discount_start_date'] = $book_info->discount_start_date;
        $data['options']['discount_end_date'] = $book_info->discount_end_date;
        $data['options']['discount_price'] = $book_info->discount_price;

        Cart::add($data);
        return Redirect::to('/show-cart');
    }

    public function show_cart(){
        return view('cart');
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }

    public function order_place(Request $request){
        
        $last_order = DB::table('orders')->orderby('id','desc')->first();
        $last_order_item = DB::table('order_items')->orderby('id','desc')->first();
        
        //Insert order
        $order = array();
        $order['id'] = ($last_order->id) + 1;
        $order['order_date'] = $request->order_date;
        $order['order_amount'] = Cart::subtotal();

        //Insert order_details
        $content = Cart::content();
        if($content->count() > 0){
            DB::table('orders')->insert($order);
        } else {
            return '<script type="text/javascript">
            alert("Cart is empty to place order!");
            setTimeout(function(){ window.location.replace("/show-cart"); }, 1000);
            </script>';
        }
        $order_d_data = array();
        $order_id = ($last_order_item->id) + 1;

        foreach ($content as $v_content) {
            $order_d_data['id'] = $order_id;
            $order_d_data['order_id'] = ($last_order->id) + 1;
            $order_d_data['book_id'] = $v_content->id;
            $order_d_data['quantity'] = $v_content->qty;
            $order_d_data['price'] = $v_content->price;
            $search_book = DB::table('books')->where('id',$v_content->id)->get();
            if($search_book->isEmpty()){
                Cart::remove($v_content->rowId);
                return '<script type="text/javascript">
                alert("Some books in the cart are unavailable!");
                setTimeout(function(){ window.location.replace("/show-cart"); }, 1000);
                </script>';
            } else{
                DB::table('order_items')->insert($order_d_data);
                $order_id = $order_id + 1;
            }
        }

        Cart::destroy();

        return '<script type="text/javascript">
        alert("A new book order is placed successfully!");
        setTimeout(function(){ window.location.replace("/home"); }, 1000);
        </script>';
    }
}
