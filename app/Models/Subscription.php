<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = ['id_subscription'];
    protected $table = 'subscription';
    protected $primaryKey = 'id_subscription';


    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function bundle(){
        return $this->belongsTo(Bundle::class, 'id_bundle', 'id_bundle');
    }
}
