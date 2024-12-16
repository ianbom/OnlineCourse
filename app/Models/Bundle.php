<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{

    protected $guarded = ['id_bundle'];
    protected $table = 'bundle';
    protected $primaryKey = 'id_bundle';


    public function subsription(){
        return $this->hasMany(Subscription::class, 'id_bundle' , 'id_bundle');
    }

    public function order(){
        return $this->hasMany(Order::class, 'id_bundle' , 'id_bundle');
    }
}
