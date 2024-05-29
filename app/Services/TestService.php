<?php

namespace App\Services;

use App\Models\Sale;

class TestService 
{
    public function test()
    {
        $sales = Sale::query()
            ->with('seller')
            ->with('products')
            ->get();

        dd($sales->toArray());
        return $sales->toJson();
    }
}