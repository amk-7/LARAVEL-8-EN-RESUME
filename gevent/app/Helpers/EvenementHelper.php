<?php

namespace App\Helpers;

use App\Models\Organisateur;
use Carbon\Carbon;

class EvenementHelper
{
    public static function afficherDateEtDate(Carbon $carbon)
    {
        return "Le ".$carbon->format("d-m-Y")." à ".$carbon->format("H:i");
    }

    public static function afficherAdresse(array $array)
    {
        return "À ".$array['ville'].", ".$array['quartier']." vers le ".$array['lieu'];
    }

    public static function afficherOrganisateur($id)
    {
        return Organisateur::all()->where('id_organisateur', $id)->first()->user->nom;
    }
}
