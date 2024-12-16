<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = ['id_order'];
    protected $table = 'order';
    protected $primaryKey = 'id_order';


    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function bundle(){
        return $this->belongsTo(Bundle::class, 'id_bundle', 'id_bundle');
    }

    public function payment(){
        return $this->hasMany(Payment::class, 'id_order', 'id_order');
    }
}
