<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'type',
        'status',
        'code',
        'credit_hours',
        'instructor'
    ];
    public function teachers()
{
    return $this->belongsToMany(Teacher::class);
}
}
