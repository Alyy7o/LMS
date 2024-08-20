<?php

namespace App\Models;

use App\Models\Parents;
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
}
