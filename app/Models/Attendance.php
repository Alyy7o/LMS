<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'section_id',
        'teacher_id',
        'date',
        'status',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];


    public function students(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function sections(){
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function teachers(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

}
