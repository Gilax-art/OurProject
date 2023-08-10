<?php

namespace App\Console\Commands;

use App\Http\Traits\GlobalTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Daylik extends Command
{
    use GlobalTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daylik';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ежедневное получение курса доллара к рублю через api и запись этого значения в соответствующий файл.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rsp = Http::get('https://api.currencyapi.com/v3/latest?apikey=fca_live_1GW38G71X0JjpYvfvJoZ7xwJLDZWOZTwQmp4qC12&currencies=RUB');
        $usdObj = $rsp->object();
        $usd = round($usdObj->data->RUB->value, 1);
        $this->setUSD($usd);
    }
}
