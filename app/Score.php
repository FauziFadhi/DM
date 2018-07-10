<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    protected $fillable = [
    	'No','Kehadiran','Tugas','UTS','UAS','Nilai'
    ];
}
