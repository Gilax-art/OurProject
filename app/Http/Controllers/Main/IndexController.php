<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Helpers\OrderStatusEnum;
use App\Helpers\Telegram;
use App\Http\Requests\IndexTgStoreRequest;
use App\Models\Cases;
use App\Models\Orders;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        $team = Team::all();
        $cases = Cases::orderby('id', 'desc')->take(4)->get();
        return view('index', compact(['team', 'cases']));
    }

//    public function create() {
//        return view('order');
//    }


    public function tstore(IndexTgStoreRequest $request, Telegram $telegram) {

        $data = $request->validated();

        $data['status'] = OrderStatusEnum::NOW;
        if(!empty($data['file'])) {
            $data['file'] = Storage::disk('public')->put('files/orders', $data['file']);
        }
        Orders::create($data);

        $idChannel = '-1001810625813';
        $botToken = '6175287159:AAEJeVPnHUqxEuSxrmVlNP5soaK76xI7nUk';
        $botData = "<b>Поступил новый заказ!</b>   \n\nИмя: <b>{$data['name']}</b>   \nТелефон: <b>{$data['phone']}</b>";
        if(!empty($data['description'])){
            $botData .= "\nОписание: <b>".$data['description']."</b>";
        }
        if(!empty($data['file'])){
            $botData .= "\nПрикрепляю файл с ТЗ ниже:";
        }
        $telegram->sendMessage($idChannel, $botData, $botToken);
        if(!empty($data['file'])){
            $file = $data['file'];
            $telegram->sendDocument($idChannel, $file, $botToken);
        }

        return response()->json(['status' => 'success']);
    }
}
