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
        Schema::create('fonctionnalites', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('cacher_chiffres_affaires')->default(false);
            $table->boolean('activer_sms')->default(false);
            $table->enum('mode_sms', ['auto', 'manuel'])->nullable();
            $table->boolean('couture_mixte')->default(false);
            $table->enum('type_couture', ['homme', 'femme', 'mixte'])->nullable();
            $table->json('messages')->default(json_encode([
                'nouvelleCommande' => 'Votre commande a bien été enregistrée. Merci de nous faire confiance !',
                'avanceVersee' => 'Nous avons bien reçu votre avance. Votre commande est en cours de traitement.',
                'commandePrete' => 'Votre commande est prête. Merci de venir la récupérer dès que possible.',
                'retardRecuperation' => 'Votre commande est prête depuis plus de 3 jours. Merci de venir la récupérer rapidement.',
            ]));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonctionnalites');
    }
};
