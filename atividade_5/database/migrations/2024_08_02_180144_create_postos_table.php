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
        Schema::create('postos', function (Blueprint $table) {
            $table->id();
            $table->text('nome');
            $table->text('cnpj');
            $table->text('endereco');
            $table->text('cep');
            $table->text('cidade');
            $table->decimal('cordX');
            $table->decimal('cordY');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postos');
    }
};
