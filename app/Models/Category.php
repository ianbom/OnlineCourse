<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id_category'];
    protected $table = 'category';
    protected $primaryKey = 'id_category';




    public function courseCategory(){
        return $this->hasMany(CourseCategory::class, 'id_category', 'id_category');
    }

    public function course()
    {
        return $this->belongsToMany(Course::class, 'course_category', 'id_category', 'id_course');
    }

    public function subCategories(){
        return $this->hasMany(SubCategory::class, 'id_category', 'id_category');
    }


}
