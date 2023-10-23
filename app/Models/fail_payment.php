<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fail_payment extends Model
{
    use HasFactory;
    
       protected $table = 'fail_payment';

       protected $fillable=[

        
        'amount',
        'billing_address1',
        'billing_address2',
        'billing_address3',
        'billing_address4',
        'country_name',
        'email',
        
         'first_name',
        'last_name',
        'phone',
        'reason',
        'zipcode',
    
        
    ];
    
    
    
    
    
}
