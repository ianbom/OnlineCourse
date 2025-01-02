<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id_question'];
    protected $table = 'question';
    protected $primaryKey = 'id_question';

    public function materi(){
        return $this->belongsTo(Materi::class, 'id_materi', 'id_materi');
    }

    public function option(){
        return $this->hasMany(Option::class, 'id_question', 'id_question');
    }

    public function answer(){
        return $this->hasMany(Answer::class, 'id_question', 'id_question');
    }
}
