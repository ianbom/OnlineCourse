<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = ['id_option'];
    protected $table = 'option';
    protected $primaryKey = 'id_option';

    public function question(){
        return $this->belongsTo(Question::class, 'id_question', 'id_question');
    }

    public function answer(){
        return $this->hasMany(Answer::class, 'id_option', 'id_option');
    }
}
