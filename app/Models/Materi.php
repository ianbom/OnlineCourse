<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{

    protected $guarded = ['id_materi'];
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';

    public function content(){
        return $this->belongsTo(Content::class, 'id_content', 'id_content');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'id_course', 'id_course');
    }

    public function textBook(){
        return $this->hasMany(TextBook::class, 'id_materi', 'id_materi');
    }

    public function rating(){
        return $this->hasMany(Rating::class, 'id_rating', 'id_rating');
    }
}
