<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorThesis extends Model
{
    use HasFactory;
    protected $fillable =[
'thesis_id','supervisor_id'

    ];
}
