<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',  // Add this line
        'total_obtained_marks',
        'total_marks',
        'percentage',  // Include any other fields you have
    ];


    public function students(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}
