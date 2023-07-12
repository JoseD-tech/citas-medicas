<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    public function PacienteCita () {
        return $this->belongsTo(Paciente::class);
    }
    public function Doctor() {
        return $this->belongsTo(Doctor::class);
    }
    public function Secretario(){
        return $this->belongsTo(Secretatio::class);
    }
}
