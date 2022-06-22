<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    use HasFactory;

    public $table = 'cages';

    public $guarded = [''];

    public function type_cages()
    {
        return $this->belongsTo(TypeCage::class, 'type_cage_id');
    }
}
