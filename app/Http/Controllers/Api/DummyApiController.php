<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DummyApiController extends Controller
{
    public function get_data(){

      return $data=[
          "name"=> "Ali",
          "email"=> "Ali@email.com",
          "phone"=> "12345555555"
        ];
    }
}
