<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('users');
            $table->decimal('total_amount', 8, 2);
            $table->decimal('payment_received', 8, 2)->default(0);
            $table->string('receipt_number')->unique()->nullable();
            
            $table->string('customer_name')->required();
            $table->string('payment_method')->required();
            $table->string('account_number')->required()->nullable();

            $table->string('payment_intent_id')->nullable(); // Paymongo Payment Intent ID
            $table->string('status')->default('pending'); // pending, success, failed
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
