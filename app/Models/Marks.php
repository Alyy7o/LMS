<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marks extends Model
{
    use HasFactory;

    public function students(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subjects(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
