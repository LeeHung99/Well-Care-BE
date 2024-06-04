<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Se_categories extends Model
{
    use HasFactory;
    protected $table = 'se_categories';
    protected $primaryKey = 'id_se_category';
    public function Category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
