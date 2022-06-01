<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    use HasFactory;

    public $table = 'cages';

    public $guarded = [''];

    public function typeCages()
    {
        return $this->belongsTo(Cage::class. 'type_cage_id');
    }
}
