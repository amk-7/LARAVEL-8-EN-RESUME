<?php

namespace App\Service;

use Illuminate\Http\Request;

class EvenementService
{
    public static function validateFromRequest(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'montant' => 'required',
            'date' => 'required',
            'ville' => 'required',
            'quartier' => 'required',
            'lieu' => 'required',
            'organisateur' => 'required',
        ]);
    }
}
