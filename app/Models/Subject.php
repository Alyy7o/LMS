<?php

namespace App\Models;

use App\Models\Marks;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class_id',
        'section_id',
        
    ];

    public function class(){
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function marks(){
        return $this->hasMany(Marks::class, 'subject_id');
    }
}
