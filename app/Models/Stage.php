<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Stage extends Model
{
    use HasTranslations;
    use HasFactory;

    public $translatable = ['name', 'notes'];
    protected $fillable = ['name', 'notes'];

    public function grades()
    {
        return $this->hasMany(Grade::class, 'stage_id');
    }

    public function Classrooms()
    {
        return $this->hasMany(Classroom::class, 'stage_id');
    }
}
