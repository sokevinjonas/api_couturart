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
        Schema::create('mesure_clients', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('client_id'); // Définit 'user_id' comme string
            $table->string('user_id'); // Définit 'user_id' comme string
            $table->json('mesures'); // Champ JSON pour stocker les mesures en tant qu'objets
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesure_clients');
    }
};
