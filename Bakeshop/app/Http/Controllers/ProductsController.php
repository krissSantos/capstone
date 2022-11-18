<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductsPhoto;
use DB;


class ProductsController extends Controller
{


    public function showUpload(){
        return view('products_upload');
    }

    public function uploadPhoto($id, Request $request){
        $product = new ProductsPhoto;
        $product->product_ID = $id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect("/products");

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::select("SELECT * FROM products AS p LEFT JOIN products_photos AS pp ON p.product_ID = pp.product_ID");
        return view('/products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_new_products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->product_ID= $product->product_ID;
        $product->product_name = $request->input('pname');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();
        
        return redirect("/products");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = DB::select("SELECT * FROM products WHERE product_ID = " . $id);

        return view('edit_products', compact("products"));
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
        $product = Product:: where('product_ID', $id) -> update([
            "product_name"=> $request->input("pname"),
            "price"=> $request->input("price"),
            "stock"=> $request->input("stock")
        ]);
        return redirect("/products");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where("product_ID",$id) ->delete();

        return redirect("/products");
    }
}
