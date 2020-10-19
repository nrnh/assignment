<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Order;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $history = History::latest()->paginate(5);

        return view('history', ['history'=>$history, 'total'=>$history->sum('product_price')])
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

    public function store(Request $request)
    {
        Order::create($request->all());

        return redirect()->to('history')
        ->with('success', 'Order has been placed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $History
     * @return \Illuminate\Http\Response
     */
    public function show(History $History)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $History
     * @return \Illuminate\Http\Response
     */
    public function edit(History $History)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $History
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $History)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $History
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $History)
    {
        $History->delete();

        return redirect()->to('history');
    }
}
