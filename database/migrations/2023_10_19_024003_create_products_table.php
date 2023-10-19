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

            $table->string('code')->unique();
            $table->string('name')->unique();

            $table->integer('stock');
            $table->string('image');

            $table->decimal('sell_price',12,2);
            $table->enum('status',['ACTIVE','DEACTIVATED'])->default('ACTIVE');

            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('category_id');
            
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('category_id')->references('id')->on('categories');

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
