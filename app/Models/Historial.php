<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    public function HistoriaCita() {
        return $this->belongsTo(Cita::class);
    }
    public function HistoriaPaciente() {
        return $this->belongsTo(Paciente::class);
    }
    public function HistoriaDoctor() {
        return $this->belongsTo(Doctor::class);
    }
    public function HistoriaSecretario() {
        return $this->belongsTo(Secretatio::class);
    }
}
