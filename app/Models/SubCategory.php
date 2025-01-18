<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = ['id_sub_category'];
    protected $table = 'sub_category';
    protected $primaryKey = 'id_sub_category';

    public function category(){
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }
}
