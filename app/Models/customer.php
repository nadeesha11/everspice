<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable=[

        
        'cus_username',
        'cus_email',
        'cus_telephone',
        'cus_password'
       
        
    ];
}
