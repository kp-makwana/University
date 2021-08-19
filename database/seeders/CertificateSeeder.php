<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certificate::insert([
            'user_id'=>1,
            'name' => 'BCA',
            'issue_date'=>now(),
            'stream_class'=>'12 class',
            'language'=>'English',
            'passing_year'=>'2017',
            'obtain_class'=>'A',
            'status'=>1,
        ]);
    }
}
