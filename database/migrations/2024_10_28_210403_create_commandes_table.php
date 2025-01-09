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
        Schema::create('commandes', function (Blueprint $table) {
            $table->string('id');
            $table->enum('status', ['attente', 'pret', 'urgente', 'annuler', 'livrer']);
            $table->text('detail');
            $table->text('besoin')->nullable();
            $table->integer('total');
            $table->integer('avance');
            $table->integer('reste');
            $table->string('livraison');
            $table->json('photos')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
            $table->string('client_id');
            $table->string('user_id');

            // Définition de la clé étrangère
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
