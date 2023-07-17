<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    public function PacienteCita() {
        return $this->belongsTo(Paciente::class, 'paciente_id', 'id');
    }
    public function Doctor() {
        return $this->belongsTo(Doctor::class);
    }
    public function Secretario(){
        return $this->belongsTo(Secretatio::class);
    }
    public function Estado(){
        return $this->belongsTo(Estado::class);
    }
    public function HistorialCitas(){
        return $this->belongsTo(Historial::class);
    }
}
