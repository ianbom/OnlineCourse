<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{


    protected $guarded = ['id_note'];
    protected $table = 'note';
    protected $primaryKey = 'id_note';

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function materi(){
        return $this->belongsTo(Materi::class, 'id_materi', 'id_materi');
    }
}
