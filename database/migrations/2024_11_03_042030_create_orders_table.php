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
            $table->string('customer_name');
            $table->integer('table_no');
            $table->dateTime('order_datetime');
            $table->string('status');
            $table->integer('total');
            $table->unsignedBigInteger('waitress_id');
            $table->unsignedBigInteger('cashier_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('waitress_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cashier_id')->references('id')->on('users')->onDelete('cascade');
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
