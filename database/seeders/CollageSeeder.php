<?php

namespace Database\Seeders;

use App\Models\Collage;
use Illuminate\Database\Seeder;

class CollageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collage::insert([
            'name' => 'MKBU',
            'user_id'=>1,
            'university_id'=>1,
            'code'=>'001',
            'contact'=>'1234567890',
            'address'=>'Bhavnagar',
        ]);
    }
}
