<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = ['personne'];
    protected $primaryKey = 'id_participant';

    public function user()
    {
        return $this->belongsTo(User::class,"personne");
    }

    public function evenements(){
        return $this->belongsToMany(Evenement::class, "evenements_participants", "id_evenement", "id_participant")
                    ->withPivot(array("impression"));
    }
}
