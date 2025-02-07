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
            $table->string('id');
            $table->enum('status', ['tard', 'vendu', 'credit', 'annuler']); 
            $table->integer('discount')->default(0);
            $table->integer('totalAmount');
            $table->json('items');
            $table->string('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
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
