<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id_course'];
    protected $table = 'course';
    protected $primaryKey = 'id_course';


    public function content(){
        return $this->hasMany(Content::class, 'id_course', 'id_course');
    }

    public function courseCategory(){
        return $this->hasMany(CourseCategory::class, 'id_course', 'id_course');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'course_category', 'id_course', 'id_category');
    }
}
