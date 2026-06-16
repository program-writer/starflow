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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_email');
            $table->decimal('amount', 12, 2);
            $table->decimal('shipping_cost', 12, 2)->default(0);
            $table->string('status');
            $table->boolean('is_paid')->default(false);
            $table->string('payment_transaction_id')->nullable();
            $table->string('idempotency_key')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
