<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public const STREAMING = [
        '10' => '10 Class',
        '12' => '12 Class',
        'BCA'=>'BCA',
        'MCA'=>'MCA'
    ];
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
