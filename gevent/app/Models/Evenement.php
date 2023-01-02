<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'montant',
        'organisateur',
        'date',
        'adresse',
    ];

    protected $casts = [
        'adresse' => 'array'
    ];

    protected $dates = [
        'date',
    ];

    protected $primaryKey = 'id_evenement';

    public function getNombreParticipant()
    {
        return $this->participants->count();
    }
    public function organisateur()
    {
        return $this->belongsTo(Organisateur::class, "organisateur");
    }

    public function participants(){
        return $this->belongsToMany(Participant::class, "evenements_participants", "id_evenement", "id_participant")
                    ->withPivot(array("impression"));
    }
}
