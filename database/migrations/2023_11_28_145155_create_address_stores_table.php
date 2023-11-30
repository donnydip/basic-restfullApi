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
        Schema::create('address_stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customer_stores')->onDelete('cascade');
            $table->string('address');
            $table->string('district');
            $table->string('city');
            $table->string('province');
            $table->integer('postal_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_stores');
    }
};
