<?php

namespace App\Http\Controllers;

use App\Models\ProductDiscount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Discount/Index', [
            'discounts' => ProductDiscount::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Discount/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'desc' => [''],
            'discount_percent' => ['required'],
            'active' => ['boolean']
        ]);

        ProductDiscount::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'discount_percent' => $request->discount_percent,
            'active' => $request->active
        ]);

        return Redirect::route('product-discounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDiscount $productDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = ProductDiscount::findOrFail($id);

        return Inertia::render('Admin/Discount/Edit', [
            'discount' => $discount
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $discount = ProductDiscount::findOrFail($id);

        $discount->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'discount_percent' => $request->discount_percent,
            'active' => $request->active
        ]);

        return Redirect::route('product-discounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = ProductDiscount::findOrFail($id);
        $discount->delete();

        return Redirect::route('product-discounts.index');
    }
}
