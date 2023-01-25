<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\transaction;
use App\Models\cart;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = item::doesntHave('cart')->where('stock', '>', 0)->get();
        $carts = item::has('cart')->get()->sortByDesc('cart.create_at');
        return view('masterTransaction', compact('items', 'carts'));
        // return $carts;
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

    public function checkout(request $request)
    {
        transaction::create($request->all());
        foreach (cart::all() as $item) {
            transactionDetail::create([
                'trasaction_id' => transaction::latest()->first()->id,
                'item_id' => $item->item_id,
                'qty' => $item->qty,
                'subtotal' => $item->item->price*$item->qty
            ]);
        }
        
        cart::truncate();

        return redirect(route('transaction.show', transaction::latest()->first()->id));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        cart::create($request->all());
        return redirect()-back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function history() {
        $histories = transaction::all()->sortByDesc('created_at');
        return view('historytransaction', compact('histories'));
    }

    public function show($id)
    {
        $detail = transaction::find($id);
        return view('detailTransaction', compact('detail'));
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
