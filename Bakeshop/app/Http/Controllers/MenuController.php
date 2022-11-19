<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;

class MenuController extends Controller
{
    public function showMenu(){
            $products = DB::select("SELECT * FROM products WHERE stock > 0");

            return view('Menu', compact('products'));  
    }

    public function showCart(Request $request){
            $products = DB::select("SELECT * FROM products WHERE stock > 0");
            $total = 0;
            for ($i = 0; $i < count($products); $i++){
                $total += ($products[$i] -> price) * $request -> input('order_' . $products[$i] -> product_ID);
            }
           
            return view('cart', compact('products', 'total', 'request'));
        }
        
    public function checkout(Request $request){
        if (Session::get('id')){
            $order = new Order;
            $order->customer_ID = Session::get('id');
            $order->save();

            $products = DB::select("SELECT * FROM products WHERE stock > 0");

            for ($i = 0; $i < count($products); $i++){
                $ordered = $request -> input('order_' . $products[$i] -> product_ID);

                if ($ordered > 0){
                    $op = new OrderProduct;
                    $op->order_ID = $order -> order_ID;
                    $op->product_id = $products[$i] -> product_ID;
                    $op->quantity = $ordered;
                    $op->price = $products[$i]->price * $ordered;
                    $op->save();
                }
            }

            return "Order placed";
        }else{
            return "Not logged in!";
        }
    }
    public function showMyOrders(){
        if (Session::get('id')){
        $orders = DB::select("SELECT * FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID WHERE o.status != 'completed' AND o.customer_ID = " . Session::get('customer_ID'));

        $totals = DB::select("SELECT SUM(op.price) AS total FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID WHERE o.status != 'completed' AND o.customer_ID = ". Session::get('customer_ID'));

        return view('mycart', compact('orders', 'totals'));
    }
    else{
        return "Not logged in!";
    }
    }
}
