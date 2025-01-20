<?php

namespace App\Models;

use App\Models\Licence;
use App\Models\Abonnement;
use Illuminate\Database\Eloquent\Model;

class SmsManagement extends Model
{
    
    protected $guarded = [];

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function licence()
    {
        return $this->belongsTo(Licence::class);
    }
}
