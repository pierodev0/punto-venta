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

            $table->string('code')->unique()->nullable();
            $table->string('name')->unique();

            $table->integer('stock')->default(0);
            $table->string('image')->nullable();

            $table->decimal('sell_price',12,2);
            $table->enum('status',['ACTIVE','DEACTIVATED'])->default('ACTIVE');

            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('category_id');
            
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

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
