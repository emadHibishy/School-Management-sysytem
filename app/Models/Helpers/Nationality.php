<?php

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name'];
    public $translatable = ['name'];
    public $timestamps = false;
}
