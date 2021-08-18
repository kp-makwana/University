<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public const STREAMINGS = [
        '10' => '10 Class',
        '12' => '12 Class',
        'BCA'=>'BCA',
        'MCA'=>'MCA'
    ];
}
