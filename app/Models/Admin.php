<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasFactory, Notifiable;

    

    // public function parent(){
    //     return $this->hasMany(Parent::class);
    // }   

    protected $fillable = [
        'owner_id',
        'f_name',
        'l_name',
        'cnic',
        'pic',
        'gender',
        'date_of_birth',
        'blood_group',
        'religion',
        'email',
        'password',
        'mob_no',
        'phone_no',
        'address',
        'salary',
        'doc_pic',
    ];

    // Relationship to the User who created the admin
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function teacher(){
        return $this->hasMany(Teacher::class, 'admin_id');
    }
}
