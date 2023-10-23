<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping_price extends Model
{
    use HasFactory;

    protected $table = 'shipping_prices';

    protected $fillable=[

        'country_name',
        'shipping_price'
       
        
    ];


}
