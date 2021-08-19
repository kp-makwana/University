<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::insert([
            'user_id'=>1,
            'first_name' => 'First',
            'mid_name'=>'mid',
            'last_name'=>'last_name',
            'date_of_birth'=>now(),
            'gender'=>1,
            'phone'=>'123465798',
            'address'=>'Bhavnagar',
        ]);
    }
}
