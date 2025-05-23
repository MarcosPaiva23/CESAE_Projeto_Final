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
        Schema::table('users', function (Blueprint $table) {
            $table->string('curso');
            $table->date('data_conclusao');
            $table->boolean('horario');
            $table->boolean('tem_carro');
            $table->string('morada');
            $table->string('foto')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'curso',
                'data_conclusao',
                'horario',
                'tem_carro',
                'morada',
                'foto'
            ]);//
        });
    }
};
