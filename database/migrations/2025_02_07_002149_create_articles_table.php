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
        Schema::create('articles', function (Blueprint $table) {
            $table->string('id');
            $table->string('libelle');
            $table->integer('prix');
            $table->integer('stock');
            $table->string('taille')->nullable();
            $table->string('categorie');
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
        Schema::dropIfExists('articles');
    }
};
