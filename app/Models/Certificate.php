<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    public const STREAMING = [
        '10' => '10 Class',
        '12' => '12 Class',
        'BCA' => 'BCA',
        'MCA' => 'MCA'
    ];
    public const LANGUAGE = [
        'eng' => 'english',
        'hin' => 'hindi',
        'guj' => 'gujarati',
    ];
    public const OBTAIN = [
        'obtain' => 'obtain',
        'first' => 'first',
        'second' => 'second',
        'pass' => 'pass',
        'fail' => 'fail',
    ];
    public const STATUS = [
        '0' => 'unclaimed',
        '1' => 'claimed'
    ];
}
