<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait GlobalTrait
{   
    public $usd = 90;

    public function setUSD($newUSD)
    {
        if(!is_null($newUSD) || !empty($newUSD)){
            $this->usd = $newUSD;
            Storage::disk('public')->put('currency/dollar.txt',  $newUSD);
        }
        return $this->usd;
    }

    public function getUSD()
    {
        $this->usd = (float)Storage::disk('public')->get('currency/dollar.txt');
        return $this->usd;
    }
}