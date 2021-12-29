<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    //
    protected $table = 'diagnoses';

    protected $fillable = [
        'patient_id',
        'diag_details',
        'chronic',
        'remark',
        'antecedent',
    ];



    function patients(){

        $this->belongsTO(Patient::class);
    }
}
