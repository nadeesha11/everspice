<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    
    
    protected $table='coupons';
    
    protected $fillable =[
        
      'offer_name',
      'Product_id',
      'coupon_code',
      'coupon_limit',
      'coupon_discount',
      'item_count_per_cus',
      'status',
    ];
    
    
}
