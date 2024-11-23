<?php

namespace App\Services;

use App\Models\Sale;
use DB;
use Luigel\Paymongo\Facades\Paymongo;

class SaleService
{
    public function createGcashPayment($amount, $name, $number)
    {
        $paymentIntent = Paymongo::paymentIntent()
            ->create([
                'amount' => $amount,
                'payment_method_allowed' => [
                    'gcash',
                ],
                'description' => 'Sale payment',
                'statement_descriptor' => 'EMS STORE',
                'currency' => 'PHP',
            ]);

        $paymentMethod = Paymongo::paymentMethod()
            ->create([
                'type' => 'gcash',
                'billing' => [
                    'name' => $name,
                    'email' => 'test@gmail.com',
                    'phone' => $number,
                ],
            ]);

        $attachedPaymentIntent = $paymentIntent->attach($paymentMethod->id, url('gcash/pay/success'));

        return $attachedPaymentIntent;
    }

    public function createSale($data)
    {
        try {
            DB::beginTransaction();

            $sale = Sale::create([
                'seller_id' => auth()->id(),
                'total_amount' => $data["total_amount"],
                'receipt_number' => "RN" . rand(100000, 999999),
                'customer_name' => $data["customer_name"],
                'payment_method' => $data["payment_method"],
                'account_number' => $data["account_number"] ?? null,
                'payment_intent_id' => $data["payment_intent_id"] ?? null,
            ]);

            $products = $data["products"];

            foreach ($products as $product) {
                $sale->products()->attach($product['product_id'], [
                    'quantity' => $product["quantity"],
                    'cost' => $product["cost"],
                    'price' => $product["price"],
                    'item_total' => $product["item_total"],
                ]);
            }

            DB::commit();

            return $sale;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deductStock(Sale $sale)
    {
        $products = $sale->products;

        if (!$sale->payment_intent_id) {
            return;
        }

        $paymentIntent = Paymongo::paymentIntent()->find($sale->payment_intent_id);


        if ($paymentIntent->status !== 'succeeded') {
            return;
        }

        foreach ($products as $product) {
            DB::table('products')->where('id', $product->id)->decrement('stock', $product->pivot->quantity);
        }
    }

    public function updateSaleStatus(Sale $sale, $status)
    {
        $sale->update([
            'status' => $status,
        ]);
    }
}
