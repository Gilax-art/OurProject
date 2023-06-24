<?php

namespace App\Http\Controllers;

use App\Helpers\OrderStatusEnum;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrdersUpdateRequest;
use App\Models\Orders;
use App\Models\Team;
use App\Models\User;
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
    public function store(OrderStoreRequest $request)
    {
        $data = $request->validated();

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
        $team = Team::all();
        $user_name = '';
        $start_user_name = '';
        $start_date = '';
        $users = [];
        $finish_user_name ='';
        $finish_date ='';
        if(!empty($order->status_user_id)){
            $user_name = User::where('id', '=', $order->status_user_id)->value('name');
        }
        if(!empty($order->start_data)){
            $start_data = json_decode($order->start_data);
            $start_user_name = User::where('id', '=', $start_data->user_id)->value('name');
            $start_date = $start_data->start_date;
        }
        if(!empty($order->users)){
            foreach(json_decode($order->users) as $user):
                $users[] = Team::where('id', '=', $user)->value('title');
            endforeach;
        }
        if(!empty($order->finish_data)){
            $finish_data = json_decode($order->finish_data);
            $finish_user_name = User::where('id', '=', $finish_data->user_id)->value('name');
            $finish_date = $finish_data->finish_date;
        }
        return view('admin.orders.show', compact(['order', 'team', 'user_name', 'users', 'start_user_name', 'start_date', 'finish_user_name', 'finish_date']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $order)
    {
        $team = Team::all();
        return view('admin.orders.edit', compact(['order', 'team']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdersUpdateRequest $request, Orders $order)
    {
        $data = $request->validated();

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
        if(!empty($request['deadline'])){
            $data['deadline'] = $request['deadline'];
        }
        if(!empty($request['users'])){
            foreach($request['users'] as $user):
                $userArray[] = $user;
            endforeach;
            $data['users'] = $userArray;
        }

        $order->update($data);

        return redirect()->route('orders.index')->with('success','Заказ обновлён');
    }

    public function take(Orders $order)
    {
        $data['status'] = OrderStatusEnum::PENDING;
        $data['status_user_id'] = auth()->id();
        $order->update($data);
        return redirect('admin/orders/'.$order->id);
    }

    public function start(Request $request, Orders $order)
    {
        $data['status'] = OrderStatusEnum::WORK;

        $current_date = date('d-m-Y');
        $start_data = [
            'user_id' => auth()->id(),
            'start_date' => $current_date,
        ];
        $data['start_data'] = json_encode($start_data);
        $data['deadline'] = $request['deadline'];
        foreach($request['users'] as $user):
            $userArray[] = $user;
        endforeach;
        $data['users'] = $userArray;
        $order->update($data);
        return redirect('admin/orders/'.$order->id);
    }

    public function finish(Orders $order)
    {
        $data['status'] = OrderStatusEnum::COMPLETED;

        $user_id = auth()->id();
        $current_date = date('d-m-Y');
        $finish_data = [
            'user_id' => $user_id,
            'finish_date' => $current_date,
        ];
        $data['finish_data'] = json_encode($finish_data);
        $order->update($data);
        return redirect('admin/orders/'.$order->id);
    }

    public function decline(Orders $order)
    {
        $data['status'] = OrderStatusEnum::REFUNDED;
        $order->update($data);
        return redirect('admin/orders/'.$order->id);
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
