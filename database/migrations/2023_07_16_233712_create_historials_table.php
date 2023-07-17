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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->require();
            $table->foreignId('paciente_id')->require()->constrained('pacientes');
            $table->foreignId('doctor_id')->require()->constrained('doctors');
            $table->foreignId('secretaria_id')->require()->constrained('secretatios');
            $table->foreignId('cita_id')->require()->constrained('citas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};
