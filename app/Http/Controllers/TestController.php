<?php

namespace App\Http\Controllers;

use App\Mail\HelloWorld;
use App\Services\TestService;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    protected $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function test()
    {
        return $this->testService->test();
    }

    public function testMail()
    {
        $mail =  new HelloWorld(name: 'John Doe');
        
        // Mail::to('jrj.nms@gmail.com')->send($mail);
        return $mail;
    }
}
