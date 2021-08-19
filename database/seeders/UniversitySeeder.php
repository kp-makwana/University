<?php

namespace Database\Seeders;

use App\Models\university;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        university::insert([
            'name' => 'MKBU',
            'code'=>'001',
            'contact'=>'1234567890',
            'address'=>'Bhavnagar',
            'user_id'=>1
        ]);
    }
}
