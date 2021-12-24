<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDiscount;
use App\Models\ProductInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductResource::collection(Product::all());
        // return $products;
        // $categories = [];
        // $inventory = [];
        // foreach($products as $prod) {
        //     dump($prod->inventory->quantity);
        // }
        return Inertia::render("Admin/Product/Index", [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Product/Create', [
            'categories' => ProductCategory::all(),
            'discounts' => ProductDiscount::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

            $image_path = '';

    if ($request->hasFile('imageFile')) {
        $image_path = $request->file('imageFile')->store('image');
    }

       $inventory = ProductInventory::create(['quantity' => $request->quantity]);
        $request->merge(['image_url' => $image_path]);

        $inventory->product()->create($request->all());
    //     $inventory->product()->create([
    //         'name' => $request->name,
    //         'desc' => $request->desc,
    //         'SKU' => $request->SKU,
    //         'category_id' => $request->category_id,
    //         'discount_id' => $request->discount_id,
    //         'price' => $request->price
    //     ]);
    //    $inventory->product()->create();


        return Redirect::route('products.index');
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return Redirect::route('products.index');
    }
}
