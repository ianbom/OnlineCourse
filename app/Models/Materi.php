<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $guarded = ['id_materi'];
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';


    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course', 'id_course');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'id_rating', 'id_rating');
    }

    public function note()
    {
        return $this->hasMany(Note::class, 'id_materi', 'id_materi');
    }

    public function question()
    {
        return $this->hasMany(Question::class, 'id_materi', 'id_materi');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class, 'id_materi', 'id_materi');
    }

    public function history()
    {
        return $this->hasMany(Materi::class, 'id_materi', 'id_materi');
    }

    public function finished()
    {
        return $this->hasMany(Materi::class, 'id_materi', 'id_materi');
    }
}
