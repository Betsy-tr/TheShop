<?php

namespace App\Models;
use App\Models\Produit;
use App\Models\User ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','produit_id','texte'];

    public function produit() : BelongsTo
    {
        return $this->belongsTo(Produit::class) ;
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class) ; 
    }
}
