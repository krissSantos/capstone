<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use DB;
use Session;

class OrdersController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::get("role") == "admin"){
        $orders = DB::select("SELECT * FROM orders AS O INNER JOIN users AS u ON o.customer_ID = u.customer_ID INNER JOIN order_products AS op ON o.order_ID = op.order_ID;");
        return view('/orders', compact('orders'));
        
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
        return view('create_order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return redirect("/orders");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = DB::select("SELECT * FROM orders AS o INNER JOIN users AS u ON o.customer_ID = u.customer_ID INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products AS p ON op.product_ID = p.product_ID WHERE o.order_ID = " . $id);

        return view('show_orders', compact("orders"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Session::get("role") == "admin"){
        $orders = DB::select("SELECT * FROM orders WHERE order_ID = " . $id);

        return view('/edit_orders', compact("orders"));
    }
    else{
        return "No permission!";
    }
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
        if (Session::get("role") == "admin"){
        $orders = Order:: where('order_ID', $id) -> update([
          
            "status"=> $request->input("status")
        ]);
        return redirect("/admin/orders");
    }else{
        return "No permission!";
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Session::get("role") == "admin"){
        $order = Order::where("order_ID",$id) ->delete();

        return redirect("/admin/orders");
    }
    else{
        return "No permission!";
    }
}
}