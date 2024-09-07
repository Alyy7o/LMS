<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'student_id',
        'amount',
        'status',
        
    ];

        public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

