<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    public $table = 'pets';

    public $guarded = [''];

    public function typePets()
    {
        return $this->belongsTo(TypePet::class, 'type_pet_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
