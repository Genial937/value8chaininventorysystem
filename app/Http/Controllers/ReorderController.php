<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reorder;
use Illuminate\Http\Request;

class ReorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reorders  = Reorder::with('products')->latest()->get();
        return view('reorders.index', compact('reorders','reorders'));
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
        //update reorder table
        $reorder = Reorder::findOrFail($id);
        $reorder->recharge_quantity = $request->recharge_quantity;
        $reorder->status = '1';
        $reorder->save();
        //update quantities in products table
        $product = Product::find($reorder->product_id);
        $product->stock_quantity = $product->stock_quantity + $request->stock_recharge_quantity;
        $product->store_quantity = $product->store_quantity + $request->recharge_quantity;
        $product->save();

        return back()->with('message','Stock updated successfully!');

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
