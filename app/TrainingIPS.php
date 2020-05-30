<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingIPS extends Model
{
    protected $table = 'training_ips';

    protected $fillable = [
    'ind1','ind2','ind3','ind4','ind5','ing1','ing2','ing3','ing4','ing5','mat1','mat2','mat3','mat4','mat5','geo1','geo2','geo3','geo4','geo5','eko1','eko2','eko3','eko4','eko5','sos1','sos2','sos3','sos4','sos5','status'];

    protected $hidden = [
    'id','created_at','updated_at'
    ];
}
