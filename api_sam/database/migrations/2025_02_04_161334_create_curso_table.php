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
        Schema::create('curso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_instituicao')
                  ->constrained('instituicao')
                  ->restrictOnDelete();
            $table->string('nome_curso', 100);
            $table->enum('situacao', ['A', 'I']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso');
    }
};
