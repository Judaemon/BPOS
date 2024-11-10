<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleRequest;
use App\Models\Sale;
use App\Services\SaleService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Luigel\Paymongo\Facades\Paymongo;

class GCashController extends Controller
{
    private $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function processPayment(CreateSaleRequest $request)
    {
        $validatedData = $request->validated();
        $paymentIntent = $this->saleService->createGcashPayment(
            $validatedData['total_amount'],
            $validatedData['customer_name'],
            $validatedData['account_number']
        );

        $paymentIntent = $paymentIntent->getAttributes();
        $sale = [
            'payment_method' => $validatedData['payment_method'],
            'total_amount' => $validatedData['total_amount'],
            'customer_name' => $validatedData['customer_name'],
            'account_number' => $validatedData['account_number'],
            'payment_intent_id' => $paymentIntent['id'],
            'products' => $validatedData['products'],  
        ];

        $sale = $this->saleService->createSale($sale);

        return redirect()->back()->with([
            'sale' => $sale,
            'paymentIntent' => $paymentIntent,
            'message' => 'Gcash payment request created successfully',
        ]);
    }

    public function handleSuccess(Request $request)
    {
        $payment_intent_id = $request->input('payment_intent_id');

        if (!$payment_intent_id) {
            return redirect()->route('gcash.failed');
        }

        $paymentIntent = Paymongo::paymentIntent()->find($payment_intent_id);
        $sale = Sale::where('payment_intent_id', $payment_intent_id)->first();

        if (!$paymentIntent->getAttributes()["payments"]) {
            $this->saleService->updateSaleStatus($sale, 'failed'); 

            return redirect()->route('gcash.failed');
        }


        $this->saleService->deductStock($sale);
        $this->saleService->updateSaleStatus($sale, 'success');
        
        return Inertia::render('Payment/PaymentSuccess', [
            'sale' => $sale,
            'message' => 'Payment successful!',
        ]);
    }

    public function handleFailed(Request $request)
    {
        return Inertia::render('Payment/PaymentFailed', [
            'message' => 'Payment failed!',
        ]);
    }
}
