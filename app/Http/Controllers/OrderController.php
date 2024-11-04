<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        return response(["data" => $order]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|max:100',
            'table_no' => 'required|max:5',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->only(['customer_name', 'table_no']);
            $data['order_datetime'] = now();
            $data['status'] = "ordered";
            $data['total'] = 0;
            $data['waitress_id'] = auth()->user()->id;
            $data['items'] = $request->items;
            $data['qty'] = $request->qty;

            $order = Order::create($data);

            collect($data['items'])->map(function ($item, $index) use ($order, $data) {
                $fooddrink = Item::where('id', $item)->first();
                $totalPerItem = $fooddrink->price * $data['qty'][$index];

                OrderDetail::create([
                    'order_id' => $order->id,
                    'item_id' => $item,
                    'price' => $fooddrink->price,
                    'qty' => $data['qty'][$index],
                    'total_per_item' => $totalPerItem
                ]);
            });

            $order->total = $order->sumOrderPrice();
            $order->save();

            DB::commit();
        } catch (\Throwable $th) {
            return response($th);
        }

        return response(["data" => $order]);
        // return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response(['data' => $order->loadMissing(
            'orderDetail:order_id,price,qty,total_per_item,item_id',
            'orderDetail.item:id,name',
            'waitress:id,name',
            'cashier:id,name'
        )]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    
    public function setAsDone($id)
    {
        $order = Order::findOrFail($id);

        if($order->status != 'ordered'){
            return response('order cannot set to done because the status is not ordered', 403);
        }

        $order->status = 'done';
        $order->save();

        return response(['data' => $order]);
    }

    public function payment($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status != 'done') {
            return response('payment cannot be done because the status is not done', 403);
        }

        $order->status = 'paid';
        $order->save();

        return response(['data' => $order]);
    }
}
