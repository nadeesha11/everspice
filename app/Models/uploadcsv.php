<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class uploadcsv extends Model
{
    use HasFactory;
    
    
    
     protected $table='coupons';
    
     protected $fillable=[

   
        
       
        'Product_id',
        'coupon_code',
        'coupon_limit',
        'coupon_discount',
        'offer_name',
        'item_count_per_cus',
        'status',
       
        
    ];
    
    
    
    
}
