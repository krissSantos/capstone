<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecentOrder;
use DB;

class RecentOrdersController extends Controller
{

    public function create()
    {
        $ro=DB::select('SELECT * FROM recent_orders');
        return view('process_orders');
    }

    
    public function updateOrders(Request $request){
        // $ro = new RecentOrder;
        // $ro->product_ID= $ro->product_ID;
        // $ro->quantity = $request->input('quantity') + $ro->quantity;
        // $ro->save();
        $ro = RecentOrder:: where ('product_ID', $request->product_ID)
        ->update([
            'quantity' => $request->input('quantity')
        ]);
        return redirect("/process_orders");
    }
}
