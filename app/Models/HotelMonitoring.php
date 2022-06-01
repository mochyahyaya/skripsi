<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelMonitoring extends Model
{
    use HasFactory;

    public $table = 'hotel_monitorings';

    public $guarded = [''];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
