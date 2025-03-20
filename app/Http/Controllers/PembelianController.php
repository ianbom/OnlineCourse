<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Str;

class PembelianController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function indexOrder()
    {
        $userId = Auth::id();
        $order = Order::where('id', $userId)
            ->latest()
            ->paginate(5);

        return view('web.user.order.index_order', compact('order'));
    }
    public function showOrder(Order $order)
    {
        $userId = Auth::id();
        $order = Order::where('id', $userId)->findOrFail($order->id_order);

        return view('web.user.order.show_order', ['order' => $order]);
    }

    public function bayarOrder(Order $order)
    {
        try {
            $userId = Auth::id();
            $checkSubs = Subscription::where('id', $userId)->first();
            $checkSubsActive = Subscription::where('id', $userId)->where('status_subs', true)->first();
            $payment = Payment::where('id_order', $order->id_order)->first();
            /** @var object $status */
            $status = \Midtrans\Transaction::status($payment->id_payment_gateway);
            $payment = Payment::create([
                'id_order' => $order->id_order,
                'price_total' => $status->gross_amount,
                'payment_method' => $status->payment_type,
                'payment_status' => $status->transaction_status == 'settlement' ? 'success' : 'Proses',
            ]);

            $order->status_order = $status->transaction_status == 'settlement' ? 'success' : 'Proses';
            $order->save();

            if ($order->status_order == 'success') {
                if ($checkSubsActive) {
                    $checkSubsActive->update([
                        'id_bundle' => $order->id_bundle,
                        'status_subs' => true,
                        'start_date' => now(),
                        'end_date' => Carbon::parse($checkSubsActive->end_date)->addDays($order->bundle->duration),
                    ]);
                }
                if ($checkSubs) {
                    $checkSubs->update([
                        'id_bundle' => $order->id_bundle,
                        'status_subs' => true,
                        'start_date' => now(),
                        'end_date' => Carbon::parse($checkSubs->end_date)->addDays($order->bundle->duration),
                    ]);
                } else {
                    Subscription::create([
                        'id' => $order->id,
                        'id_bundle' => $order->id_bundle,
                        'status_subs' => true,
                        'start_date' => now(),
                        'end_date' => now()->addDays($order->bundle->duration)
                    ]);
                }
            }
            return formatResponse(true, 'Transaksi berhasil dimulai', [
                'snap_token' => $payment->snap_token,
                'status' => $status->transaction_status,
            ]);
        } catch (\Exception $e) {
            $id_payment_gateway = $order->id_order . '-' . Str::uuid();
            $transactionDetails = [
                'order_id' => $id_payment_gateway,
                'gross_amount' => $order->price_total,
            ];

            // Customer details
            $customerDetails = [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ];

            // Payload for Midtrans Snap
            $params = [
                'transaction_details' => $transactionDetails,
                'customer_details' => $customerDetails,
            ];
            $snapToken = Snap::getSnapToken($params);
            Payment::create([
                'id_order' => $order->id_order,
                'price_total' => $order->price_total,
                'payment_method' => 'Belum Pilih',
                'payment_status' => 'Proses',
                'snap_token' => $snapToken,
                'id_payment_gateway' => $id_payment_gateway
            ]);

            return formatResponse(true, 'Transaksi berhasil dimulai', [
                'snap_token' => $snapToken,
            ]);
        }
    }

    public function cancelOrder(Order $order)
    {
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
