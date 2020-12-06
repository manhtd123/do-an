<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use File;
use App\Http\Requests\ProductsStoreFormRequest;
use App\Http\Requests\ProductsEditFormRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductsStoreFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'bua' => $request->thucdon,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'describe' => $request->describe,
            'category_id' => $request->categories,
        ]);
        $product->save();
        
        if($request->hasFile('image')) {
            foreach($request->image as $image) {
                $filename = $image->getClientOriginalName();
                $image->move(config('app.link_product'), $filename);
 
                $image = new Image([
                    'product_id' => $product->id,
                    'name' => $filename,
                ]);
                
                $image->save();
            }
            $product->img = $filename;
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $imageHead = Image::where('product_id', $id)->first();
        $images = Image::where('product_id', $id)->where('id', '!=', $imageHead->id)->get();
        return view('admin.products.show', compact('product', 'images', 'imageHead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $images = Image::where('product_id', $id)->get();
        $selectedCategory = $product->category()->pluck('id')->toArray();
        $selectedBua = $product->pluck('bua')->toArray();
        return view('admin.products.edit', compact('product', 'categories', 'images', 'selectedCategory', 'selectedBua'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductsEditFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->bua = $request->thucdon;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->describe = $request->describe;
        $product->category_id = $request->categories;
        $product->save();
        if($request->hasFile('image')) {
            foreach($request->image as $image) {
                $filename = $image->getClientOriginalName();
                $image->move(config('app.link_product'), $filename);
 
                $image = new Image([
                    'product_id' => $product->id,
                    'name' => $filename,
                ]);
                
                $image->save();
            }
        }
        return redirect()->back()->with('success', 'cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        $product->save();
        return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công');
    }

    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        $imageCount = Image::where('name', $image->name)->count();
        $filename = $image->name;
        if($imageCount == 1) {
            File::delete(config('app.link_product') . $filename);
        }
        $image->delete();
        $image->save();
        return redirect()->route('product.index')->with('success', 'Xóa ảnh thành công');
    }
}
