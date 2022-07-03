<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMonitoringBreed extends Model
{
    use HasFactory;

    public $table = 'image_breed_monitorings';

    public $guarded = [''];
}
