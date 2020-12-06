<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BillProduct;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use App\Models\BillProductDetail;

class DealProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = BillProduct::all();

        return view('admin.deal.product.index', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        $user = User::all()->first();
        return view('admin.deal.product.create', compact('products', 'suppliers', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quantityunit = $request->quantity1;
        $unittotal = $request->unittotal;
        $supplier_id = $request->supplier;
        $date = $request->date;
        $quantity = $request->quantity;
        $total = $request->total;
        $product_id = $request->product_id1;
        $user_id = $request->user;
        $bill = new BillProduct(array('quantity' => $quantity, 'total' => $total,'date' => $date, 'supplier_id' => $supplier_id, 'user_id' => $user_id));

        $bill->save();
        if(count($quantityunit) > count($unittotal))
            $count = count($quantityunit);
        else $count = count($unittotal);
        $billDetails = array();
        for($i = 0; $i < $count; $i++){
            $billDetail = new BillProductDetail(array('quantity' => $quantityunit[$i], 'total' => $unittotal[$i], 'product_id' => $product_id[$i], 'bill_product_id' => $bill->id));
            $billDetail->save();
            $billDetails[] = $billDetail;
            $product = Product::where('id', $product_id[$i])->first();
            $product->quantity += $quantityunit[$i];
            $product->save();
        }
        return redirect()->route('dealProduct.index')->with('success', 'Thêm hóa đơn thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deal = BillProduct::findOrFail($id);
        $products = BillProductDetail::where('bill_product_id', $id)->get();

        return view('admin.deal.product.show', compact('deal', 'products'));
    }

    public function getProduct(Request $request){
        $data = Product::findOrFail($request->product);
        return response ()->json( $data );
    }
}
