<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'stage_id', 'grade_id'];
    public $timestamps = false;

    public function Stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
