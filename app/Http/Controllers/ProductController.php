<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', ['products' => $products]);
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
        //return $request->all();
        Product::create($request->all());
        return redirect()->back()->with('success', 'เพิ่มข้อมูลสินค้าสำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();



        // dd($request, $request->id);
        $product = Product::find($id);
        if (!$product) {
            return back()->with('Error', 'ไม่เจอสินค้านี้');
        }
        $product->update($request->all());
        return redirect()->back()->with('success', 'เเก้ไขข้อมูลสินค้าสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {

        $product = Product::find($id);
        if (!$product) {
            return back()->with('Error', 'ไม่เจอสินค้านี้');
        }
        $product->delete();
        return redirect()->back()->with('success', 'ลบข้อมูลสินค้าสำเร็จ');
    }
}
