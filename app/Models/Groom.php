<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groom extends Model
{
    use HasFactory;

    public $table = 'grooms';

    public $guarded = [''];

    public function pets()
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }

    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
