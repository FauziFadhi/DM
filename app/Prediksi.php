<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediksi extends Model
{
    //
    protected $fillable = [
    	'Kehadiran','Tugas','UTS','UAS','Nilai','Target'
    ];
}
