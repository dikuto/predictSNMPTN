<?php

namespace App\Imports;

use App\SiswaIPS;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaIPSImport implements ToModel, WithHeadingRow 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SiswaIPS([
            'nisn' => $row['nisn'],
            'nama' => $row['nama'],
            'angkatan' => $row['angkatan'],
            'ind1' => $row['ind1'],
            'ind2' => $row['ind2'],
            'ind3' => $row['ind3'],
            'ind4' => $row['ind4'],
            'ind5' => $row['ind5'],
            'ing1' => $row['ing1'],
            'ing2' => $row['ing2'],
            'ing3' => $row['ing3'],
            'ing4' => $row['ing4'],
            'ing5' => $row['ing5'],
            'mat1' => $row['mat1'],
            'mat2' => $row['mat2'],
            'mat3' => $row['mat3'],
            'mat4' => $row['mat4'],
            'mat5' => $row['mat5'],
            'geo1' => $row['geo1'],
            'geo2' => $row['geo2'],
            'geo3' => $row['geo3'],
            'geo4' => $row['geo4'],
            'geo5' => $row['geo5'],            
            'eko1' => $row['eko1'],
            'eko2' => $row['eko2'],
            'eko3' => $row['eko3'],
            'eko4' => $row['eko4'],
            'eko5' => $row['eko5'],            
            'sos1' => $row['sos1'], 
            'sos2' => $row['sos2'],
            'sos3' => $row['sos3'],
            'sos4' => $row['sos4'],
            'sos5' => $row['sos5'],            
            'ptn' => $row['ptn'],
            'jurusan' => $row['jurusan'],
            'status' => $row['status'],
            
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
