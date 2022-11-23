<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model; 

class BakeshopController extends Controller
{
    public function showHome(){
        if (Session::get('id')){
            $orders = DB::select("SELECT * FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID INNER JOIN products_photos AS pp ON p.product_ID = pp.product_ID WHERE o.status != 'completed' AND o.customer_ID = "  . Session::get('id'));

            $totals = DB::select("SELECT SUM(op.price) AS total FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID WHERE o.status != 'completed' AND o.customer_ID = ". Session::get('id'));

            return view('bakeshop', compact('orders', 'totals'));
       }
       else{
            return view('bakeshop');
       }
    }
    
}
