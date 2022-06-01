<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedMonitoring extends Model
{
    use HasFactory;

    public $table = 'breed_monitorings';

    public $guarded = [''];

    public function breeds()
    {
        return $this->belongsTo(Breed::class, 'breed_id');
    }
}
