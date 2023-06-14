<?php

namespace App\Http\Controllers;

use App\Helpers\Telegram;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::orderby('id', 'desc')->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        if(!empty($request['file'])){
            $data['file'] = $request['file'];
            $data['file'] = Storage::disk('public')->put('files/orders', $data['file']);
        }
        if(!empty($request['description'])){
            $data['description'] = $request['description'];
        }

        Orders::create($data);

        return redirect()->route('orders.index')->with('success','Новый заказ добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $order)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        if(!empty($request['file'])){
            if(!empty($order['file'])){
                $order['file'] = Storage::disk('public')->delete('files/orders', $order['file']);
            }
            $data['file'] = $request['file'];
            $data['file'] = Storage::disk('public')->put('files/orders', $data['file']);
        }
        if(!empty($request['description'])){
            $data['description'] = $request['description'];
        }

        $order->update($data);

        return redirect()->route('orders.index')->with('success','Заказ обновлён');
    }
    
    public function take(Request $request, Orders $order)
    {
        $data['status'] = 'Принят';
        $order->update($data);
        return view('admin.orders.show', compact('order'));
    }

    public function decline(Request $request, Orders $order)
    {
        $data['status'] = 'Отклонён';
        $order->update($data);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $order)
    {
        $order->delete();
        if(!empty($order['file'])){
            $order['file'] = Storage::disk('public')->delete('files/orders', $order['file']);
        }
        return redirect()->route('orders.index')->with('success','Заказ удалён');
    }
}
