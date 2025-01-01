<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaketLanggananController extends Controller
{
    public function index(){
        $bundle = Bundle::all();

        return view('web.user.paket_langganan.index_paket', ['bundle' => $bundle]);
    }

    public function order(Bundle $bundle){
        $userId = Auth::id();

        try {
            $orderData = [
                'id_bundle' => $bundle->id_bundle,
                'id' => $userId,
                'name_bundle' => $bundle->name_bundle,
                'price_total' => $bundle->price,
                'status_order' => 'pending',
            ];

            // Simpan data order
            $order = Order::create($orderData);
            return redirect()->route('order.show', $order->id_order)->with('success', 'Order created');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }

        //
    }




}
