<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Content extends Model
{
    use Sortable;

    protected $guarded = ['id_content'];
    protected $table = 'content';
    protected $primaryKey = 'id_content';

    public function course(){
        return $this->belongsTo(Course::class, 'id_course', 'id_course');
    }

    public function materi(){
        return $this->hasMany(Materi::class, 'id_content', 'id_content');
    }
}
