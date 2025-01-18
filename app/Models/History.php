<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarded = ['id_history'];
    protected $table = 'history';
    protected $primaryKey = 'id_history';

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
