<?php

namespace App\Imports;

use App\Models\uploadcsv;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class csvImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
     
        
        return new uploadcsv([
           
      
      
        'Product_id' => $row['product_id'],
        
       
        'coupon_code' => $row['coupon_code'],
    
        'coupon_limit' => $row['coupon_limit'],
        'coupon_discount' => $row['coupon_discount'],
        
        
        
            
            
             
        ]);
    }
}
