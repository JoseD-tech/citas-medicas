<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretatio extends Model
{
    use HasFactory;
    public function Secretarios() {
        return $this->belongsTo(Cita::class);
    }
    public function HistorialSecretatios(){
        return $this->belongsTo(Historial::class);
    }
}
