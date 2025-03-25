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
        Schema::create('dias_viagem', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->boolean('segunda')->default(false);
            $table->boolean('terca')->default(false);
            $table->boolean('quarta')->default(false);
            $table->boolean('quinta')->default(false);
            $table->boolean('sexta')->default(false);
            $table->timestamps();
            $table->primary('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dias_viagem');
    }
};
