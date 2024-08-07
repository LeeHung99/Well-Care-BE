<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'name', 'avatar', 'price', 'in_stock', 'brand', 'hide', 'id_third_category',
        'id_image_product', 'sick', 'object', 'id_sick', 'id_object', 'short_des', 'description', 'origin', 'unit',
        'symptom', 'hot', 'sale',
    ];
    public function Third_categories()
    {
        return $this->belongsTo(Third_categories::class, 'id_third_category');
    }
    public function Objects()
    {
        return $this->belongsTo(Objects::class, 'id_object');
    }
    public function Image_product()
    {
        return $this->belongsTo(Third_categories::class, 'id_image_product');
    }
    public function Sick()
    {
        return $this->belongsTo(Sick::class, 'id_sick');
    }
    public function images_product()
    {
        return $this->belongsTo(Image_products::class, 'id_image_product');
    }
    public function comment()
    {
        return $this->hasMany(Comments::class, 'id_product');
    }
}
