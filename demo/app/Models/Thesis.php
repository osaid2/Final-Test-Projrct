<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'category_id',
        'student_id',
        'active',
    
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function supervisor()
    {
        return $this->belongsToMany(Supervisor::class, 'supervisor_theses');
    }
}
