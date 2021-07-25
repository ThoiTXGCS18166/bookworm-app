<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'book_id',
        'review_title',
        'review_details',
        'review_date',
        'rating_start',
    ];
}
