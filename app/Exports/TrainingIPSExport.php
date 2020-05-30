<?php

namespace App\Exports;

use App\TrainingIPS;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainingIPSExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TrainingIPS::all();
    }

    public function headings(): array
    {
        return [
            'ind1','ind2','ind3','ind4','ind5','ing1','ing2','ing3','ing4','ing5','mat1','mat2','mat3','mat4','mat5','geo1','geo2','geo3','geo4','geo5','eko1','eko2','eko3','eko4','eko5','sos1','sos2','sos3','sos4','sos5','status'
        ];
    }
}
