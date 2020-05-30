<?php

namespace App\Imports;

use App\SiswaIPA;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaIPAImport implements ToModel, WithHeadingRow 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SiswaIPA([
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
            'fis1' => $row['fis1'],
            'fis2' => $row['fis2'],
            'fis3' => $row['fis3'],
            'fis4' => $row['fis4'],
            'fis5' => $row['fis5'],            
            'kim1' => $row['kim1'],
            'kim2' => $row['kim2'],
            'kim3' => $row['kim3'],
            'kim4' => $row['kim4'],
            'kim5' => $row['kim5'],            
            'bio1' => $row['bio1'], 
            'bio2' => $row['bio2'],
            'bio3' => $row['bio3'],
            'bio4' => $row['bio4'],
            'bio5' => $row['bio5'],            
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
