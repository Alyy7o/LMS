<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\Parents;
use App\Models\Teacher;
use App\Models\SuperAdmin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasRole($role)
    {
        return $this->role === $role; // Assuming `role` is a column in your `users` table
    }
    
    public function super_admin()
    {
        return $this->hasOne(SuperAdmin::class, 'owner_id');
    }

    public function owner()
    {
        return $this->hasOne(Owner::class, 'owner_id');
    }
    
    public function admin()
    {
        return $this->hasOne(Admin::class, 'admin_id');
    }

    public function parent()
    {
        return $this->hasOne(Parents::class, 'owner_id');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'owner_id');
    }

    public function fees(){
        return $this->hasMany(Fee::class, 'student_id');
    }


}
