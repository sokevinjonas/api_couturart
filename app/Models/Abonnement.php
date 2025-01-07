<?php

namespace App\Models;

use App\Models\User;
use App\Models\Licence;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function licence()
    {
        return $this->belongsTo(Licence::class);
    }
}
