<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Owner;
use App\Models\Classes;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'owner_id',
        'admin_id',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function admin() 
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_teacher', 'teacher_id', 'classes_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'section_teacher','teacher_id','section_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_teacher','teacher_id','student_id');
    }

    public function assignTo($user)
    {
        if ($user->hasRole('owner')) {

            $this->owner_id = $user->id;
        } elseif ($user->hasRole('admin')) {

            $this->admin_id = $user->id;
        }
        $this->save();
    }

    public function attendances(){
        return $this->hasMany(Attendance::class, 'teacher_id');
    }
}
