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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_sku', 255);
            $table->string('model', 255);
            $table->string('color', 255);
            $table->integer('size');
            $table->integer('heel_height');
            $table->string('category', 255);
            $table->integer('price');
            $table->integer('stocks');
            $table->integer('display_stocks');
            $table->integer('outlet_stocks');
            $table->string('order_from', 255)->nullable();
            $table->string('bundle', 255)->nullable();
            $table->string('Bulk', 255)->nullable();
            $table->string('BulkNo', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
