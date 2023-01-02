<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisateur extends Model
{
    use HasFactory;
    protected $fillable = ['personne'];
    protected $primaryKey = 'id_organisateur';

    public function user()
    {
        return $this->belongsTo(User::class,"personne");
    }

    public function evenements()
    {
        return $this->hasMany(Evenement::class, "organisateur");
    }
}
