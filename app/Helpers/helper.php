<?php

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;


if (!function_exists('checkSubs')) {
    function checkSubs(){
        $userId = Auth::id();
        $checkSubs = Subscription::where('id', $userId)->first();
        if ($checkSubs == null) {
          return false;
        }
        if($checkSubs->status_subs == true){
            return true;
        }else{
            return false;
        }
    }
}

if (!function_exists('checkMateri')) {
    function checkMateri(){
        $userId = Auth::id();
        $checkSubs = Subscription::where('id', $userId)->first();
        if ($checkSubs == null) {
          return false;
        }
        if($checkSubs->status_subs == true){
            return true;
        }else{
            return false;
        }
    }
}
