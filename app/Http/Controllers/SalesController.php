<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reorder;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::with('products')->latest()->get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::latest()->get();
        return view('sales.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quantity = $request->quantity;
        //check if there is enough stock versus quantity being ordered
        $product = Product::find($request->product_id);
        if ($product->store_quantity < $quantity) {
            return back()->with('danger','The product stock is less than desired quantity');
        }
         //store in sales table
         $sale = Sale::create(array_merge($request->all(),
         [
             'user_id' => Auth::user()->id,
         ]));
         //update quantities
         $product->stock_quantity = $product->stock_quantity - $quantity;
         $product->store_quantity = $product->store_quantity - $quantity;
         $product->save();

         //initiate reorder if store is below alert level
         $check = Product::where('id', $product->id)->whereColumn('store_quantity', '<','store_alert_quantity')->first();
         if($check){
             $reorder = new Reorder();
             $reorder->current_stock = $check->store_quantity;
             $reorder->current_inventory = $check->stock_quantity;
             $reorder->product_id = $check->id;
             $reorder->user_id = Auth::user()->id;
             $reorder->save();
         }

         return back()->with('message','Sale has been made successfully!');
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
