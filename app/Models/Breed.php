<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    public $table = 'breeds';
    
    public $guarded = [''];

    public function pets()
    {
        $this->belongsTo(Pet::class, 'pet_id');
    }
}
