<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\User;
use Event;
use Illuminate\Support\Facades\DB;

class TestService 
{
    public function test()
    {
        $test = DB::table('users')
            ->search('name', '.com')
            ->get();

        $test = User::query()
            ->search(['name', "email"], 'em')
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