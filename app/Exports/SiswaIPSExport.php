<?php

namespace App\Exports;

use App\SiswaIPS;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaIPSExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiswaIPS::all();
    }
}
