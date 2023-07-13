<?php

namespace App\Exports;

use App\Models\Cita;
use Maatwebsite\Excel\Concerns\FromCollection;

class CitasExport implements FromCollection
{
    public function collection()
    {
        return Cita::all();
    }
}
