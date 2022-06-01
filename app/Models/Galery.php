<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    public $table = 'galeries';

    public $guarded = [''];

    public function pets()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
