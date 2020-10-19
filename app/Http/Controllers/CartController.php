<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\History;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $cart = Cart::latest()->paginate(5);

        return view('cart', ['cart'=>$cart, 'total'=>$cart->sum('product_price')])
        ->with('i', (request()->input('page',1) -1) *5);
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
    public function storeCart(Request $request)
    {
        $cart = new Cart();
        $cart->product_id = $request->product_id;
        $cart->product_name = $request->product_name;
        $cart->product_brand = $request->product_brand;
        $cart->product_price = $request->product_price;
        $cart->product_quantity = $request->product_quantity;
        $cart->save();

        return $cart;
    }

    public function store(Request $request)
    {
        Order::create($request->all());
        History::create($request->all());

        Cart::truncate();

        return redirect()->to('home')
        ->with('success', 'Order has been placed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        
    }

    public function countCart(Request $request)
    {
        $cart = Cart::all();
        return $cart;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->to('cart');
    }
}
