<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'class_id'];
    
    public function classes(){
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function students(){
        return $this->hasMany(Student::class, 'student_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'section_teacher', 'section_id', 'teacher_id');
    }

    public function subject(){
        return $this->hasMany(Subject::class, 'section_id');
    }

    public function attendances(){
        return $this->hasMany(Attendance::class, 'section_id');
    }
}
