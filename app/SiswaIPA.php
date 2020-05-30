<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaIPA extends Model
{
    protected $table = 'siswa_ipa';

    protected $fillable = [
    'nisn','nama','angkatan','ind1','ind2','ind3','ind4','ind5','ing1','ing2','ing3','ing4','ing5','mat1','mat2','mat3','mat4','mat5','fis1','fis2','fis3','fis4','fis5','kim1','kim2','kim3','kim4','kim5','bio1','bio2','bio3','bio4','bio5','ptn','jurusan','status'];

    protected $hidden = [
    'created_at','updated_at'
    ];
}
