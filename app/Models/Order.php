<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'description', 'user_id', 'room_id'];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function guests(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
