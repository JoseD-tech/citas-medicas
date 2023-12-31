<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    public function PacientesCitas () {
        return $this->belongsTo(Cita::class, 'id', 'paciente_id');
    }
    public function HistorialPacientes(){
        return $this->belongsTo(Historial::class, 'id', "paciente_id");
    }
}
