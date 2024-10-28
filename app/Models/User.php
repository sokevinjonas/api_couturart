<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Commande;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

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

     public function commandes()
    {
        return $this->hasMany(Commande::class, 'user_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
