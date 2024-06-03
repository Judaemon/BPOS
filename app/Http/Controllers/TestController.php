<?php

namespace App\Http\Controllers;

use App\Mail\HelloWorld;
use App\Services\TestService;
use Barryvdh\DomPDF\Facade\Pdf;
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
        
        Mail::to('jrj.nms@gmail.com')->send($mail);
        return $mail;
    }

    public function testPdf()
    {
        // return "PDF created successfully!";

        $pdf = Pdf::loadView('pdf.receipt', [
            'name' => 'John Doe',
            'total' => 1000,
            'receipt_number' => '1234567890',
            'products' => [
                ['name' => 'Product 1', 'quantity' => 1, 'price' => 1000],
                ['name' => 'Product 2', 'quantity' => 1, 'price' => 1000],
                ['name' => 'Product 3', 'quantity' => 1, 'price' => 1000],
            ]
        ]);

        return $pdf->download('receipt.pdf');
    }

    public function testQueue()
    {
        dispatch(new \App\Jobs\SampleJob('hello world'));
        return "Job dispatched successfully!";
    }
}
