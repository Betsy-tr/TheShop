<?php

namespace App\Models;
use App\Models\Produit;
use App\Models\Commentaire;
use App\Models\Favori;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function produits() : HasMany
    {
        return $this->hasMany(Produit::class) ;
    }

    public function commentaires():HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

    public function favoris():HasMany
    {
        return $this->hasMany(Favori::class);
    }

    //Autorisation admin 

    public function canAccessFilament(): bool
    {
        return $this->admin == 1; 
    }
}
