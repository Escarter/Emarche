<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DiscountsController extends Controller
{
    public function index(){
    	return view('member.discount')
    }
}
