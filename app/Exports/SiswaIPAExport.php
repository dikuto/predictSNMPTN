<?php

namespace App\Exports;

use App\SiswaIPA;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaIPAExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiswaIPA::all();
    }
}
