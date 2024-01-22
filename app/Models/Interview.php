<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    function applicant(){
        return $this->belongsTo(JobsApplied::class,'applicant_id','id');
    }
}
