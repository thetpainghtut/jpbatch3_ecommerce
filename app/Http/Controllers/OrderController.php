<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct($value='')
    {
        $this->middleware('auth')->only('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('backend.order.index',compact('orders'));
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
        // dd($request);

        // validation
        $request->validate([
            'ls' => 'required',
            'notes' => 'required'
        ]);

        DB::transaction(function () use ($request){
            $lsArr = json_decode($request->ls);

            $total = 0;
            foreach ($lsArr as $row) {
                $total += $row->price*$row->qty;
            }
            // store into order table
            $order = new Order;
            $order->voucherno = uniqid();
            $order->orderdate = date('Y-m-d');
            $order->total = $total;
            $order->notes = $request->notes;
            $order->user_id = Auth::id(); // auth user_id
            $order->save();

            // store into order detail table
            foreach ($lsArr as $row) {
                $order->items()->attach($row->id,['qty'=>$row->qty]);
            }
        });

        Alert::success('Complete', 'Your Order Successful!');

        // return redirect()->route('mainpage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('backend.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
