<?php

namespace App\Models;

use App\Models\Abonnement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Licence extends Model
{

    use HasFactory;

    protected $fillable = [
        'plan',
        'prix_mensuel',
        'description',
    ];

    public function abonnements()
    {
        return $this->hasMany(Abonnement::class);
    }
}
