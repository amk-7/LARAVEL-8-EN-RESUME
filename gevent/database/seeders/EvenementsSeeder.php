<?php

namespace Database\Seeders;

use App\Models\Evenement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvenementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evenement::create([
            'nom'=>'Super concert de DAMSO',
            'montant'=>10000.0,
            'date'=>'17-12-2022',
            'adresse' => array(
                'ville' => 'sokodé',
                'quartier' => 'kparataou',
                'lieu' => 'stade municipale de sokodé',
            ),
            'organisateur' => User::all()->first()->id_user,
        ]);
    }
}
