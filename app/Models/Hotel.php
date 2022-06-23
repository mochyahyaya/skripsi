<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public $table = 'hotels';

    public $guarded = [''];

    public function pets()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }

    public function cages()
    {
        return $this->belongsTo(Cage::class, 'cage_id');
    }
}
