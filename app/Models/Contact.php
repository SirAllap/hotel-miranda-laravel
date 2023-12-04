<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['full_name', 'email', 'phone_number', 'subject_of_review', 'review_body'];
    protected $table = 'contact';
}
