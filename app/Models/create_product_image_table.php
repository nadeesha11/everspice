<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_product_image_table extends Model
{
    use HasFactory;

    protected $table = 'create_product_image_tables';

    protected $fillable=[

        
        'product_id',
        'product_main_img',
        'product_sub_img1',
        'product_sub_img2',
        'product_sub_img3',
        'product_sub_img4',
        
    ];
}
