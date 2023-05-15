<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Jezik;
use \App\Models\Nastavnik;
use \App\Models\Ocena;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //brisanje svega iz tabela
        User::truncate();
        Nastavnik::truncate();
        Jezik::truncate();
        Ocena::truncate();

        User::factory(5)->create();
        Nastavnik::factory(10)->create();

        $user = User::create([
            'name' => 'Jovana',
            'email' => 'mitic.jovana00@gmail.com',
            'password' => Hash::make('Jovana123!'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);


        $jezik1 = Jezik::create([
            'naziv' => 'španski'
        ]);

        $jezik2 = Jezik::create([
            'naziv' => 'engleski'
        ]);

        $jezik3 = Jezik::create([
            'naziv' => 'italijanski'
        ]);

        $jezik4 = Jezik::create([
            'naziv' => 'japanski'
        ]);

        $jezik5 = Jezik::create([
            'naziv' => 'francuski'
        ]);

        $ocena1 = Ocena::create([
            'datumIVreme' => now(),
            'user' => 2,
            'jezik' => 1,
            'nastavnik'=>2,
            'note' => 'Validno'
        ]);

        $ocena2 = Ocena::create([
            'datumIVreme' => now(),
            'user' => 3,
            'jezik' => 1,
            'nastavnik'=>1,
            'note' => 'Validno'
        ]);
    }
}
