<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Parents extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'parents';
    protected $guarded = [];
    public $translatable = ['father_name', 'father_job', 'mother_name', 'mother_job'];


    public function attachements()
    {
        return $this->morphMany(Attachement::class, 'attachmentable');
    }
}
