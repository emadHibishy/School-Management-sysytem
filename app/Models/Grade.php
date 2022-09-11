<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name', 'stage_id'];

    public function Stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function Classrooms()
    {
        return $this->hasMany(Classroom::class, 'grade_id');
    }
}
