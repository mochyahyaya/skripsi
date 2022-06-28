<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMonitoringHotel extends Model
{
    use HasFactory;

    public $table = 'image_monitorings';

    public $guarded = [''];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
