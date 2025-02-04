<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemateri extends Model
{
    protected $guarded = ['id_pemateri'];
    protected $table = 'pemateri';
    protected $primaryKey = 'id_pemateri';

    public function course(){
        return $this->hasMany(Course::class, 'id_pemateri', 'id_pemateri');
    }
}
