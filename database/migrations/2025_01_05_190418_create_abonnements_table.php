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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->string('starts_at');
            $table->string('ends_at');
            $table->integer('duration');
            $table->integer('amount')->default(0);
            $table->enum('status', ['active', 'expire', 'cancel']);
            $table->string('user_id');
            // $table->string('licence_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('licence_id')->constrained('licences')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};
