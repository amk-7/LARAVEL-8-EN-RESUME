<?php

namespace App\Imports;

use App\Models\Evenement;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class EvenementImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (! $row ?? "" && $row[0]==null){
            return null;
        }
        if ($row[0]=="NOM"){
            return null;
        }
        $adresse = explode(",", $row[3]);
        return new Evenement([
            'nom'=>strtoupper($row[0]),
            'montant'=>$row[1],
            'date'=>Carbon::createFromFormat("d/m/Y H:i:s", explode(",", $row[2])[1]),
            'adresse' => array(
                'ville' => $adresse[0],
                'quartier' => $adresse[1],
                'lieu' => $adresse[2],
            ),
            'organisateur' => User::all()->where('nom', strtoupper($row[4]))->first()->id_user,
        ]);
    }
}
