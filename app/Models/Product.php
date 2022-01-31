<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'price', 'quantity', 'description', 'image', 'cateogry_id','subcateogry_id', 'status'
    ];
}
