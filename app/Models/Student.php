<?php

namespace App\Models;

use App\Models\Marks;
use App\Models\Result;
use App\Models\Parents;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'about',
        'pic',
        'gender',
        'religion',
        'date_of_birth',
        'email',
        'admission_id',
        'class_id',
        'section_id',
        'roll',
        'phone',
        'fee',
    ];


    public function classes(){
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function sections(){
        return $this->belongsTo(Section::class, 'section_id');
    }
    
    public function parents(){
        return $this->belongsTo(Parents::class, 'parent_id');
    }
    
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'student_teacher', 'student_id', 'teacher_id');
    }
    
    public function fees(){
        return $this->hasMany(Fee::class, 'student_id');
    }
    
    public function attendances(){
        return $this->hasMany(Attendance::class, 'student_id');
    }
    
    public function marks(){
        return $this->hasMany(Marks::class, 'student_id');
    }
    
    public function result(){
        return $this->hasMany(Result::class, 'student_id');
    }
    

}
