<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'about',
        'pic',
        'gender',
        'religion',
        'email',
        'reg_no',
        'phone',
        'address',
        'occupation',
        'blood_group'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function students(){
        return $this->hasMany(Student::class, 'parent_id');
    }
}
