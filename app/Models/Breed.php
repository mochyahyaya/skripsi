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
        return $this->belongsTo(Pet::class, 'pet_id');
    }

    public function cages()
    {
        return $this->belongsTo(Cage::class, 'cage_id');
    }

    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
