<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandeinscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'prenom',
        'genre',
        'date',
        'nump',
        'numc',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
}