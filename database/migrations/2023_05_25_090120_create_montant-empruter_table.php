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
        Schema::create('montant_empruters', function (Blueprint $table) {
            $table->id();
            $table->integer('montant_achat');
            $table->integer('fonds_propre');
            $table->integer('frais_achat');
            $table->integer('fonds_hypotheque');
            $table->integer('montant_brut');
            $table->integer('montant_net');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('montant_empruters');
    }
};
