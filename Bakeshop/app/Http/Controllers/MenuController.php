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
        $products = DB::select("SELECT * FROM products AS p INNER JOIN products_photos AS pp ON p.product_ID = pp.product_ID WHERE stock > 0");

        if(Session::get('id')){
            
            $orders = DB::select("SELECT * FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID INNER JOIN products_photos AS pp ON p.product_ID = pp.product_ID WHERE o.status != 'completed' AND o.customer_ID = ". Session::get('id'));

            $totals = DB::select("SELECT SUM(op.price) AS total FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID WHERE o.status != 'completed' AND o.customer_ID = ". Session::get('id'));

            return view('menu', compact('products', 'totals', 'orders'));  
            
            }else {
                return view('menu', compact('products'));
    }
    }
    public function showCart(Request $request){
            $products = DB::select("SELECT * FROM products AS p INNER JOIN products_photos AS pp ON p.product_ID = pp.product_ID WHERE stock > 0");

            if(Session::get('id')){
            
                $orders = DB::select("SELECT * FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID INNER JOIN products_photos AS pp ON p.product_ID = pp.product_ID WHERE o.status != 'completed' AND o.customer_ID = ". Session::get('id'));
    
                $totals = DB::select("SELECT SUM(op.price) AS total FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID WHERE o.status != 'completed' AND o.customer_ID = ". Session::get('id'));
                
                $total = 0;
                for ($i = 0; $i < count($products); $i++){
                    $total += ($products[$i] -> price) * $request -> input('order_' . $products[$i] -> product_ID);
                }
            
                return view('cart', compact('products', 'total', 'request', 'orders', 'totals'));
            }
        }
        
    public function checkout(Request $request){
        if (Session::get('id')){
            $order = new Order;
            $order->customer_ID = Session::get('id');
            $order->full_name = $request-> input ('fname');
            $order->address = $request-> input ('address');
            $order->mobile_number = $request-> input ('mobile');
            $order->email = $request-> input ('email');
            $order->cardholder_name = $request-> input ('cname');
            $order->cardholder_number = $request-> input ('cnumber');

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

            $items_ordered = DB:: select("SELECT product_ID, quantity FROM order_products WHERE order_ID = ". $order->order_ID);
            $products = DB:: select("SELECT product_ID, stock FROM products");
            for($i = 0; $i < count ($products); $i++){
                for($j = 0; $j < count($items_ordered); $j++ ){
                        if($products[$i]->product_ID == $items_ordered[$j]->product_ID){
                            $product = Product :: where("product_ID", $products[$i]->product_ID)
                            ->update([
                                'stock'=> $products[$i]->stock - $items_ordered[$j]->quantity
                            ]);
                        }
                }
            }


            return redirect('/complete');
        }else{
            return "Not logged in!";
        }
    }

}
