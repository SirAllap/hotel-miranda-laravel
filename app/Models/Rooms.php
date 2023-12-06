<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rooms extends Model
{
    use HasFactory;
    protected $table = 'room';

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
