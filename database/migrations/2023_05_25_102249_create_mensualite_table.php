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
        Schema::create('mensualites', function (Blueprint $table) {
            $table->id();
            $table->integer('duree');
            $table->integer('capital');
            $table->double('taux_interet_annuel');
            $table->double('taux_interet_menseul');
            $table->double('mensualite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensualite');
    }
};
