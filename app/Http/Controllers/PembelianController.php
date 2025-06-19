<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{

    public function indexOrder()
{
    $userId = Auth::id();
    $order = Order::where('id', $userId)
        ->latest()
        ->paginate(5);

    return view('web.user.order.index_order', compact('order'));
}


    public function showOrder(Order $order){
        $userId = Auth::id();
        $order = Order::where('id', $userId)->findOrFail($order->id_order);

        return view('web.user.order.show_order', ['order' => $order]);
    }


    public function bayarOrder(Order $order){
        $userId = Auth::id();



        $checkSubs = Subscription::where('id', $userId)->first();
        $checkSubsActive = Subscription::where('id', $userId)->where('status_subs', true)->first();

        $payment = Payment::create([
            'id_order' => $order->id_order,
            'price_total' => $order->price_total,
            'payment_method' => 'Gratis jir',
            'payment_status' => 'Successful',
        ]);

        $order->status_order = 'success';
        $order->save();

        if ($order->status_order == 'success') {
            if ($checkSubsActive) {
                $checkSubsActive->update([
                    'id_bundle' => $order->id_bundle,
                    'status_subs' => true,
                    'start_date' => now(),
                    'end_date' => Carbon::parse($checkSubsActive->end_date)->addDays($order->bundle->duration),
                ]);
            } if ($checkSubs) {
                $checkSubs->update([
                    'id_bundle' => $order->id_bundle,
                    'status_subs' => true,
                    'start_date' => now(),
                    'end_date' => Carbon::parse($checkSubs->end_date)->addDays($order->bundle->duration),
                ]);
            } else{
                Subscription::create([
                    'id' => $order->id,
                    'id_bundle' => $order->id_bundle,
                    'status_subs' => true,
                    'start_date' => now(),
                    'end_date' => now()->addDays($order->bundle->duration)
                ]);
            }
        }

        return redirect()->back();

        return redirect()->back()->with('success', 'Order Added Successfully');
    }

    public function cancelOrder(Order $order){
        $order->status_order = 'cancelled';
        $order->save();

        return redirect()->back()->with('success', 'Order Cancelled Successfully');
    }

    public function searchOrder(Request $request)
{
    $userId = Auth::id();
    $search = $request->input('search');

    // Query dasar
    $orderQuery = Order::where('id', $userId);

    if (!empty($search)) {
        $orderQuery->where(function ($query) use ($search) {
            $query->where('name_bundle', 'like', "%{$search}%")
                  ->orWhere('id_order', 'like', "%{$search}%")
                  ->orWhere('price_total', 'like', "%{$search}%")
                  ->orWhere('created_at', 'like', "%{$search}%")
                  ->orWhere('status_order', 'like', "%{$search}%");
        });
    }

    $order = $orderQuery->latest()->paginate(5)->appends(['search' => $search]);

    // Cek apakah permintaan dari AJAX
    if ($request->ajax()) {
        return response()->json([
            'html' => view('web.user.components.table_order', compact('order'))->render()
        ]);
    }

    return view('web.user.order.index_order', compact('order'));
}

}
