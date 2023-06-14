<?php

namespace App\Http\Controllers;

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
        $orders = Orders::where('status','=', 'Новый')->orderby('id', 'desc')->get();
        $ordersCount = Orders::where('status','=', 'Принят')->count();
        $teamCount = Team::count();
        $casesCount = Cases::count();
        $reviewsCount = Reviews::count();
        return view('admin/index', compact(['orders', 'ordersCount', 'teamCount', 'casesCount', 'reviewsCount']));
    }
}
