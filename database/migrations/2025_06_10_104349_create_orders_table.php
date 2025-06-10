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
            $table->string('invoice')->unique();
            $table->foreignId('id_product')->constrained('products')->onDelete('cascade');
            $table->date('date_order');
            $table->text('other_address')->nullable();
            $table->text('notes')->nullable();
            $table->string('payment_method');
            $table->integer('qty');
            $table->decimal('total', 15, 2);
            $table->enum('status', ['pending', 'paid', 'shipped', 'delivered', 'canceled'])->default('pending');
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
