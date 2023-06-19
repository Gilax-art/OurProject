<?php

namespace App\Http\Controllers;

use App\Helpers\OrderStatusEnum;
use App\Models\Cases;
use App\Models\Orders;
use App\Models\Reviews;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders_new = Orders::where('status','=', OrderStatusEnum::NOW)->orderby('id', 'desc')->get();
        $orders_in_processing = Orders::where('status','=', OrderStatusEnum::PENDING)->orderby('id', 'desc')->get();
        $orders_current = Orders::where('status','=', OrderStatusEnum::WORK)->orderby('id', 'desc')->get();
        $orders_new_count = Orders::where('status','=', OrderStatusEnum::NOW)->count();
        $orders_in_processing_count = Orders::where('status','=', OrderStatusEnum::PENDING)->count();
        $orders_current_count = Orders::where('status','=', OrderStatusEnum::WORK)->count();
        $orders_done_count = Orders::where('status','=', OrderStatusEnum::REFUNDED)->count();
        $teamCount = Team::count();
        $casesCount = Cases::count();
        $reviewsCount = Reviews::count();
        return view('admin/index', compact(['orders_new', 'orders_in_processing', 'orders_current', 'orders_current_count', 'orders_new_count', 'orders_in_processing_count', 'orders_done_count', 'teamCount', 'casesCount', 'reviewsCount']));
    }

}
