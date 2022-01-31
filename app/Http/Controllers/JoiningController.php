<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;

class JoiningController extends Controller
{
    public function innerjoin(){
        //returns all rows from the both table, if there are matches in the both table. Otherwise, the result is NULL.
        $users = Product::join('product_categories', 'product_categories.id', '=', 'products.category_id')
               ->get(['products.*', 'product_categories.name']);
        dd($users);

    }
    public function leftjoin(){


    }
    public function rightjoin(){


    }
    public function crossjoin(){


    }
    public function advancejoin(){


    }
}
