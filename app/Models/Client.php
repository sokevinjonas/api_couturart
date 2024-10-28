<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
       /**
     * Désactiver les auto-incréments de l'ID.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Désactiver les timestamps automatiques.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Le type de clé primaire (string si c'est un UUID).
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $guarded = [];
}
