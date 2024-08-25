<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'name',
        'email',
        'password',
        'tele_no',
        'mob_no',
        'school_name',
        'address',
        'description',
        'logo',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function admin(){
        return $this->hasMany(Admin::class, 'class_id');
    }

    public function teacher(){
        return $this->hasMany(Teacher::class, 'owner_id');
    }
}
