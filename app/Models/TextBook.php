<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextBook extends Model
{
    protected $guarded = ['id_text_book'];
    protected $table = 'text_book';
    protected $primaryKey = 'id_text_book';


    public function materi(){
        return $this->belongsTo(Materi::class, 'id_materi', 'id_materi');
    }
}
