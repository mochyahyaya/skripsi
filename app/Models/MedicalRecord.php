<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    public $table = 'medical_records';

    public $guarded = [''];

    public function pets()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
