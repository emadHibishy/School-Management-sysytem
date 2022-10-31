<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersDistribution extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function Teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function Semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function SchoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }
}
