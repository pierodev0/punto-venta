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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('user_id');
            $table->datetime('purchase_date');
            $table->decimal('tax');
            $table->decimal('total');
            $table->enum('status',['VALID','CANCELED'])->default('VALID');
            $table->string('picture');
            
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
