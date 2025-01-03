<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $guarded = ['id_rating'];
    protected $table = 'rating';
    protected $primaryKey = 'id_rating';


    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function materi(){
        return $this->belongsTo(Materi::class, 'id_materi', 'id_materi');
    }
    public function content(){
        return $this->belongsTo(Content::class, 'id_content', 'id_content');
    }
}
