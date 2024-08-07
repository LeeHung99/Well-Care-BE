<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_products extends Model
{
    use HasFactory;
    protected $table = 'image_products';
    protected $primaryKey = 'id_image_product';
    protected $fillable = [
        'image_1','image_2', 'image_3', 'image_4'
    ];
    public function Products()
    {
        return $this->hasOne(Products::class, 'id_product');
    }
}
