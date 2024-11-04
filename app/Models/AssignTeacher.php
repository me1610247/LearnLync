<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignTeacher extends Model
{

    protected $fillable = ['teacher_id','class_id', 'subject_id'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
