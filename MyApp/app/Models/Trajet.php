<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nbr_place', 'depart', 'destination', 'date', 'prix'];
}