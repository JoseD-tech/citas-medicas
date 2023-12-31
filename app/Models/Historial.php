<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    public function HistoriaPaciente() {
        return $this->belongsTo(Paciente::class, 'paciente_id', 'id');
    }
}
