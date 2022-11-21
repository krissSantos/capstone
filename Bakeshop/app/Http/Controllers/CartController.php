<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProduct;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        $ops = DB::select("SELECT * FROM order_products AS  op RIGHT JOIN products AS p ON op.product_ID = p.product_ID");
        return view("/cart", compact("ops"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
       $ops = DB::select("SELECT o.order_ID, op.product_ID, quantity FROM orders AS o LEFT JOIN order_products as op ON o.order_ID = op.order_ID LEFT JOIN `products` AS p ON op.product_ID = p.product_ID;");
        $ops = new OrderProduct;
        $ops->order_ID= $ops->order_ID;
        $ops->product_ID = $request->input('product');
        $ops->quantity = $request->input('quantity');     
        $ops->save();
        return redirect("/cart");
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
