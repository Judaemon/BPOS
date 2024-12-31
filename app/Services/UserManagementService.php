<?php

namespace App\Services;

use Luigel\Paymongo\Facades\Paymongo;

class UserManagementService
{
    public function UpdateUserPassword($amount, $name, $number)
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
}
