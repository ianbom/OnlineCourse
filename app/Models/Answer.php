<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = ['id_answer'];
    protected $table = 'answer';
    protected $primaryKey = 'id_answer';

    public function question(){
        return $this->belongsTo(Question::class, 'id_question', 'id_question');
    }

    public function option(){
        return $this->belongsTo(Option::class, 'id_option', 'id_option');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function materi(){
        return $this->belongsTo(Materi::class, 'id_materi', 'id_materi');
    }
}
