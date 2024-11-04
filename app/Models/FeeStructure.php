<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $fillable = [
        'class_id',
        'academic_year_id',
        'fee_head_id',
        'january_fee',
        'february_fee',
        'march_fee',
        'april_fee',
        'may_fee',
        'june_fee',
        'july_fee',
        'august_fee',
        'september_fee',
        'october_fee',
        'november_fee',
        'december_fee',
    ]; 
    public function feeHead()
    {
        return $this->belongsTo(FeeHead::class, 'fee_head_id');
    }
    
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
    
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    
    
}
