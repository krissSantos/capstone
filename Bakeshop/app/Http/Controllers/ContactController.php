<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomersFeedback;
use Session;
use DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $feedbacks = DB::select("SELECT * FROM customers_feedback");
        if(Session::get('id')){
        $orders = DB::select("SELECT * FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID INNER JOIN products_photos AS pp ON p.product_ID = pp.product_ID WHERE o.status != 'completed' AND o.customer_ID = "  . Session::get('id'));

        $totals = DB::select("SELECT SUM(op.price) AS total FROM orders AS o INNER JOIN order_products AS op ON o.order_ID = op.order_ID INNER JOIN products as p ON op.product_ID = p.product_ID WHERE o.status != 'completed' AND o.customer_ID = ". Session::get('id'));
        return view('contact', compact('feedbacks','orders', 'totals'));  
        }

        return view('contact', compact('feedbacks'));  
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
        $feedbacks = new Customersfeedback;
        $feedbacks->full_name = $request->input('fname');
        $feedbacks->email = $request->input('email');
        $feedbacks->subject = $request->input('cs');
        $feedbacks->message = $request->input('message');
        $feedbacks->save();
        return redirect('/contact');
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
