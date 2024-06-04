<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\User;

class TestService 
{
    public function test()
    {
        $test = User::query()
            ->search('name', 'admin')
            ->get();
        
        dd('test', $test->toArray());

        $sales = Sale::query()
            ->with('seller')
            ->with('products')
            ->get();

        dd($sales->toArray());
        return $sales->toJson();
    }
}