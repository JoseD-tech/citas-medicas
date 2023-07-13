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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_cita')->require();
            $table->text('decripcion')->require();
            $table->foreignId('paciente_id')->require()->constrained('pacientes');
            $table->foreignId('doctor_id')->require()->constrained('doctors');
            $table->foreignId('secretaria_id')->require()->constrained('secretatios');
            $table->foreignId('estado_id')->require()->constrained('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};