<?php

namespace Database\Seeders;

use App\Models\Organisateur;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrganisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organisateur::create([
            'personne' => User::all()->first()->id_user,
        ]);

    }
}
