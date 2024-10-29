<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    public $incrementing = false; // Désactiver l'auto-incrémentation
    protected $keyType = 'string'; // Définir le type de la clé primaire comme string

    protected $guarded = [];
}
