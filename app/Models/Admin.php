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
        'f_name',
        'l_name',
        'gender',
        'occupation',
        'blood_group',
        'religion',
        'email',
        'address',
        'phone',
        'short_bio',
    ];
}
