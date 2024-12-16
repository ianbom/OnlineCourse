<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $guarded = ['id_payment'];
    protected $table = 'payment';
    protected $primaryKey = 'id_payment';


    public function order(){
        return $this->belongsTo(Order::class, 'id_order', 'id_order');
    }
}
