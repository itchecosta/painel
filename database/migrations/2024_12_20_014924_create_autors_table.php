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
        Schema::create('autors', function (Blueprint $table) {
            $table->id();
            $table->string('autor')->comment('Nome do autor');
            $table->longText('perfil')->comment('Descrição do perfil do autor');
            $table->string('foto')->nullable()->comment('foto do autor');
            $table->string('email')->comment('E-mail do autor');
            $table->boolean('ativo')->default(false);
            $table->boolean('publicado')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autors');
    }
};
