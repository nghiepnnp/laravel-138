<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Orders;
use App\Models\User;

class CartController extends Controller
{
    function index(){
    	 $list = Orders::where('orders.trash','=','0')
		->join("products","products.id", "=", "orders.customer_id")
		->select("products.*", "orders.*")
		->orderBy('orders.order_date', 'desc')->get();
		return view('frontend.cart.index', compact('list'));
    }
}
