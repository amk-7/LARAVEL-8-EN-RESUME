<?php

namespace Database\Seeders;

use App\Models\Evenement;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ParticipantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evenement = Evenement::all()->first();

        $participant1 = Participant::create([
            'personne' => User::all()[1]->id_user,
        ]);

        $participant2 = Participant::create([
            'personne' => User::all()[2]->id_user,
        ]);

        $evenement->participants()->attach($participant1->id_participant, array('impression' => 0,));
        $evenement->participants()->attach($participant2->id_participant, array('impression' => 0,));

    }
}
