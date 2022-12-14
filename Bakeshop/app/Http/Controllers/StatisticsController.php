<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;
use Session;
use DB;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::get("role") == "admin"){
        $products = DB::select("SELECT * FROM products");
        $orders = DB:: select("SELECT COUNT(status) AS ci FROM orders WHERE status = 'pending';");
        $totals = DB:: select("SELECT SUM(price) as total FROM order_products AS op LEFT JOIN orders AS o ON o.order_ID = op.order_ID");
        $bestsellers = DB::select("SELECT SUM(quantity) AS total , p.product_ID, product_name FROM order_products AS op INNER JOIN products as p ON op.product_ID = p.product_ID GROUP by p.product_ID, product_name ORDER BY total DESC");
        $bestproducts = DB::select("SELECT SUM(quantity) AS total , p.product_ID, product_name FROM order_products AS op INNER JOIN products as p ON op.product_ID = p.product_ID GROUP by p.product_ID, product_name ORDER BY total DESC LIMIT 1");
        return view('/statistics', compact('products','orders', 'totals','bestsellers','bestproducts'));
        }else{
            return "No permission!";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
