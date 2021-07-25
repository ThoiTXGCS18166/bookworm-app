<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');
Route::get('/home-popular', 'HomeController@index_show_popular');
Route::get('/about', 'HomeController@show_about');

Route::get('/shop', 'ShopController@index');
Route::get('/shop-show-15', 'ShopController@index_show_15');
Route::get('/shop-show-20', 'ShopController@index_show_20');
Route::get('/shop-show-5', 'ShopController@index_show_5');

Route::get('/shop-show-low', 'ShopController@index_show_low');
Route::get('/shop-show-low-15', 'ShopController@index_show_low_15');
Route::get('/shop-show-low-20', 'ShopController@index_show_low_20');
Route::get('/shop-show-low-5', 'ShopController@index_show_low_5');

Route::get('/shop-show-high', 'ShopController@index_show_high');
Route::get('/shop-show-high-15', 'ShopController@index_show_high_15');
Route::get('/shop-show-high-20', 'ShopController@index_show_high_20');
Route::get('/shop-show-high-5', 'ShopController@index_show_high_5');

Route::get('/shop-show-popularity', 'ShopController@index_show_popularity');
Route::get('/shop-show-popularity-15', 'ShopController@index_show_popularity_15');
Route::get('/shop-show-popularity-20', 'ShopController@index_show_popularity_20');
Route::get('/shop-show-popularity-5', 'ShopController@index_show_popularity_5');

Route::get('/book-category/{category_id}', 'BookController@filter_category');
Route::get('/book-category/{category_id}/{sort_type_id}', 'BookController@filter_category_by_sort');
Route::get('/book-category-show-20/{category_id}/{sort_type_id}', 'BookController@filter_category_by_sort_20');
Route::get('/book-category-show-15/{category_id}/{sort_type_id}', 'BookController@filter_category_by_sort_15');
Route::get('/book-category-show-5/{category_id}/{sort_type_id}', 'BookController@filter_category_by_sort_5');

Route::get('/book-category-show-high/{category_id}', 'BookController@filter_category_high');
Route::get('/book-category-show-low/{category_id}', 'BookController@filter_category_low');
Route::get('/book-category-show-popularity/{category_id}', 'BookController@filter_category_popularity');

Route::get('/book-author/{author_id}', 'BookController@filter_author');
Route::get('/book-author/{author_id}/{sort_type_id}', 'BookController@filter_author_by_sort');
Route::get('/book-author-show-20/{author_id}/{sort_type_id}', 'BookController@filter_author_by_sort_20');
Route::get('/book-author-show-15/{author_id}/{sort_type_id}', 'BookController@filter_author_by_sort_15');
Route::get('/book-author-show-5/{author_id}/{sort_type_id}', 'BookController@filter_author_by_sort_5');

Route::get('/book-author-show-high/{author_id}', 'BookController@filter_author_high');
Route::get('/book-author-show-low/{author_id}', 'BookController@filter_author_low');
Route::get('/book-author-show-popularity/{author_id}', 'BookController@filter_author_popularity');

Route::get('/book-rating-1-star', 'BookController@filter_1_star');
Route::get('/book-rating-1-star-sort/{sort_type_id}', 'BookController@filter_1_star_by_sort');
Route::get('/book-rating-1-star-sort-show-20/{sort_type_id}', 'BookController@filter_1_star_by_sort_20');
Route::get('/book-rating-1-star-sort-show-15/{sort_type_id}', 'BookController@filter_1_star_by_sort_15');
Route::get('/book-rating-1-star-sort-show-5/{sort_type_id}', 'BookController@filter_1_star_by_sort_5');

Route::get('/book-rating-1-star/popularity', 'BookController@filter_1_star_popularity');
Route::get('/book-rating-1-star/high', 'BookController@filter_1_star_high');
Route::get('/book-rating-1-star/low', 'BookController@filter_1_star_low');

Route::get('/book-rating-2-star', 'BookController@filter_2_star');
Route::get('/book-rating-2-star-sort/{sort_type_id}', 'BookController@filter_2_star_by_sort');
Route::get('/book-rating-2-star-sort-show-20/{sort_type_id}', 'BookController@filter_2_star_by_sort_20');
Route::get('/book-rating-2-star-sort-show-15/{sort_type_id}', 'BookController@filter_2_star_by_sort_15');
Route::get('/book-rating-2-star-sort-show-5/{sort_type_id}', 'BookController@filter_2_star_by_sort_5');

Route::get('/book-rating-2-star/popularity', 'BookController@filter_2_star_popularity');
Route::get('/book-rating-2-star/high', 'BookController@filter_2_star_high');
Route::get('/book-rating-2-star/low', 'BookController@filter_2_star_low');

Route::get('/book-rating-3-star', 'BookController@filter_3_star');
Route::get('/book-rating-3-star-sort/{sort_type_id}', 'BookController@filter_3_star_by_sort');
Route::get('/book-rating-3-star-sort-show-20/{sort_type_id}', 'BookController@filter_3_star_by_sort_20');
Route::get('/book-rating-3-star-sort-show-15/{sort_type_id}', 'BookController@filter_3_star_by_sort_15');
Route::get('/book-rating-3-star-sort-show-5/{sort_type_id}', 'BookController@filter_3_star_by_sort_5');

Route::get('/book-rating-3-star/popularity', 'BookController@filter_3_star_popularity');
Route::get('/book-rating-3-star/high', 'BookController@filter_3_star_high');
Route::get('/book-rating-3-star/low', 'BookController@filter_3_star_low');

Route::get('/book-rating-4-star', 'BookController@filter_4_star');
Route::get('/book-rating-4-star-sort/{sort_type_id}', 'BookController@filter_4_star_by_sort');
Route::get('/book-rating-4-star-sort-show-20/{sort_type_id}', 'BookController@filter_4_star_by_sort_20');
Route::get('/book-rating-4-star-sort-show-15/{sort_type_id}', 'BookController@filter_4_star_by_sort_15');
Route::get('/book-rating-4-star-sort-show-5/{sort_type_id}', 'BookController@filter_4_star_by_sort_5');

Route::get('/book-rating-4-star/popularity', 'BookController@filter_4_star_popularity');
Route::get('/book-rating-4-star/high', 'BookController@filter_4_star_high');
Route::get('/book-rating-4-star/low', 'BookController@filter_4_star_low');

Route::get('/book-rating-5-star', 'BookController@filter_5_star');
Route::get('/book-rating-5-star-sort/{sort_type_id}', 'BookController@filter_5_star_by_sort');
Route::get('/book-rating-5-star-sort-show-20/{sort_type_id}', 'BookController@filter_5_star_by_sort_20');
Route::get('/book-rating-5-star-sort-show-15/{sort_type_id}', 'BookController@filter_5_star_by_sort_15');
Route::get('/book-rating-5-star-sort-show-5/{sort_type_id}', 'BookController@filter_5_star_by_sort_5');

Route::get('/book-rating-5-star/popularity', 'BookController@filter_5_star_popularity');
Route::get('/book-rating-5-star/high', 'BookController@filter_5_star_high');
Route::get('/book-rating-5-star/low', 'BookController@filter_5_star_low');

Route::get('/book-detail/{book_id}', 'BookController@index');
Route::get('/book-detail-show-15/{book_id}', 'BookController@index_show_15');
Route::get('/book-detail-show-10/{book_id}', 'BookController@index_show_10');
Route::get('/book-detail-show-5/{book_id}', 'BookController@index_show_5');

Route::get('/book-detail-show-old/{book_id}', 'BookController@index_show_old');
Route::get('/book-detail-show-old-15/{book_id}', 'BookController@index_show_old_15');
Route::get('/book-detail-show-old-10/{book_id}', 'BookController@index_show_old_10');
Route::get('/book-detail-show-old-5/{book_id}', 'BookController@index_show_old_5');

Route::get('/book-detail-show-new/{book_id}', 'BookController@index_show_new');
Route::get('/book-detail-show-new-15/{book_id}', 'BookController@index_show_new_15');
Route::get('/book-detail-show-new-10/{book_id}', 'BookController@index_show_new_10');
Route::get('/book-detail-show-new-5/{book_id}', 'BookController@index_show_new_5');

Route::get('/book-detail-show-star-5/{book_id}', 'BookController@index_show_star_5');
Route::get('/book-detail-show-star-4/{book_id}', 'BookController@index_show_star_4');
Route::get('/book-detail-show-star-3/{book_id}', 'BookController@index_show_star_3');
Route::get('/book-detail-show-star-2/{book_id}', 'BookController@index_show_star_2');
Route::get('/book-detail-show-star-1/{book_id}', 'BookController@index_show_star_1');

Route::get('/book-detail-star-review/{book_id}/{star_number}/{sort_type_id}', 'BookController@index_show_star_review_sort');
Route::get('/book-detail-star-review-show-15/{book_id}/{star_number}/{sort_type_id}', 'BookController@index_show_star_review_sort_15');
Route::get('/book-detail-star-review-show-10/{book_id}/{star_number}/{sort_type_id}', 'BookController@index_show_star_review_sort_10');
Route::get('/book-detail-star-review-show-5/{book_id}/{star_number}/{sort_type_id}', 'BookController@index_show_star_review_sort_5');

Route::post('/add-book-review/{book_id}', 'BookController@add_book_review');

Route::get('/book-detail-show-star-review/{book_id}/{star_number}', 'BookController@index_show_star_review');
Route::get('/book-detail-show-star-review-new/{book_id}/{star_number}', 'BookController@index_show_star_review_new');
Route::get('/book-detail-show-star-review-old/{book_id}/{star_number}', 'BookController@index_show_star_review_old');

Route::post('/save-cart', 'CartController@save_cart');
Route::post('/update-cart-quantity', 'CartController@update_cart_quantity');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');

Route::post('/order-place', 'CartController@order_place');





