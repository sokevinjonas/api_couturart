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

    public $timestamps = false;

    public $incrementing = false; // Désactiver l'auto-incrémentation
    protected $keyType = 'string'; // Définir le type de la clé primaire comme string

    protected $fillable = [
        'id', // Ajouter id dans les fillable
        'etablissement',
        'adresse',
        'email',
        'logo',
        'nom',
        'pays',
        'telephone',
        'role',
        'password',
        'terms',
        'created_at',
        'updated_at'
    ];

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
