<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $guarded = ['id_course_category'];
    protected $table = 'course_category';
    protected $primaryKey = 'id_course_category';

    public function course(){
        return $this->belongsTo(Course::class, 'id_course', 'id_course');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class, 'id_sub_category', 'id_sub_category');
    }
}
