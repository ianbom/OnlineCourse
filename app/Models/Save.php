<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $guarded = ['id_save'];
    protected $table = 'save';
    protected $primaryKey = 'id_save';

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'id_course', 'id_course');
    }
}
