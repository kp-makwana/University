<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [0=>'admin@gmail.com',1=>'admin2@gmail.com',2=>'admin3@gmail.com',3=>'admin4@gmail.com',4=>'admin5@gmail.com',5=>'admin6@gmail.com',];

        for ($i = 0; $i < 5; $i++) {
            User::insert([
                'email' => $name[$i],
                'type' => 1,
                'password' => Hash::make('password')
            ]);
        }
    }
}
