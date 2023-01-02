<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nom' => 'KONDI',
            'prenom' => 'Abdoul Malik',
            'contact' => '93561240',
            'email' => 'malik.kondi@ifnti.com',
            'password' => Hash::make('amk2048'),
        ]);

        User::create([
            'nom'=>'ADJANAYO',
            'prenom'=> 'Simone',
            'contact' => '93561240',
            'email' => 'simone@gmail.com',
            'password' => Hash::make('123456789'),
        ]);

        User::create([
            'nom'=>'ISSA-TOURE',
            'prenom'=> 'Abdel Aziz',
            'contact' => '93561240',
            'email' => 'aziz@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
