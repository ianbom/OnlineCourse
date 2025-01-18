<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finished extends Model
{
    protected $guarded = ['id_finished'];
    protected $table = 'finished';
    protected $primaryKey = 'id_finished';

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'id_course', 'id_course');
    }

    public function materi(){
        return $this->belongsTo(Materi::class, 'id_materi', 'id_materi');
    }
}
