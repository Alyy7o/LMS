<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function sections(){
        return $this->hasMany(Section::class, 'class_id');
    }

    public function students(){
        return $this->hasMany(Student::class, 'class_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'class_teacher', 'classes_id', 'teacher_id');
    }

    public function subjects(){
        return $this->hasMany(Subject::class, 'class_id');
    }
    
}
