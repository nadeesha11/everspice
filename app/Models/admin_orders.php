<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_orders extends Model
{
    use HasFactory;
    
    protected $table = 'orders';

    protected $fillable=[

        
        'first_name',
        'last_name',
        'orderid',
        'order_status',
        'amount',
       
        
    ];
    
    
    
}
