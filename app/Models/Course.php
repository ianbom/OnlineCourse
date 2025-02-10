<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id_course'];
    protected $table = 'course';
    protected $primaryKey = 'id_course';


    public function content(){
        return $this->hasMany(Content::class, 'id_course', 'id_course');
    }

    public function materi(){
        return $this->hasMany(Materi::class, 'id_course', 'id_course');
    }

    public function courseCategory(){
        return $this->hasMany(CourseCategory::class, 'id_course', 'id_course');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'course_category', 'id_course', 'id_category');
    }

    public function subCatefory(){
        return $this->belongsToMany(SubCategory::class, 'course_category', 'id_course', 'id_sub_category');
    }

    public function saveCourse(){
        return $this->hasMany(Save::class, 'id_course', 'id_course');
    }

    public function history(){
        return $this->hasMany(History::class, 'id_course', 'id_course');
    }

    public function finished(){
        return $this->hasMany(Finished::class, 'id_course', 'id_course');
    }

    public function rating(){
        return $this->hasMany(Rating::class, 'id_course', 'id_course');
    }

    public function pemateri(){
        return $this->belongsTo(Pemateri::class, 'id_pemateri', 'id_pemateri');
    }
}
