<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'booking';
    protected $fillable = ['guest', 'phone_number', 'email', 'check_in', 'check_out', 'special_request', 'room_id'];
}
