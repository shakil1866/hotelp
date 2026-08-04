<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory as FactoriesHasFactory;
use Illuminate\Database\Eloquent\Model;
use lluminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use FactoriesHasFactory;
    
    protected $fillable = [
        'room_title',
        'image',
        'description',
        'price',
        'wifi',
        'room_type',

    ];
}
