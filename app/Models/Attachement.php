<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachement extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function attachmentable()
    {
        return $this->morphTo();
    }
}
