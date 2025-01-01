<table class="table table-striped bg-white w-full">
    <thead>
        <tr class="bg-[#1E90FF] text-white uppercase text-sm font-semibold">
            <th class="py-5 px-6 text-left">ID Order</th>
            <th class="py-5 px-4 text-left">Nama Paket</th>
            <th class="py-5 px-4 text-left">Total Bayar</th>
            <th class="py-5 px-4 text-left">Status</th>
            <th class="py-5 px-4 text-left">Tanggal Dibuat</th>
            <th class="py-5 px-4 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($order as $o)
        <tr class="hover:bg-gray-50 transition-colors text-[#979797] font-medium">
            <td class="py-6 px-6">{{ $o->id_order }}</td>
            <td class="py-6 px-4">{{ $o->name_bundle }}</td>
            <td class="py-6 px-4">Rp{{ number_format($o->price_total, 0, ',', '.') }}</td>
            <td class="py-6 px-4">
                @if($o->status_order === 'pending')
                    <span class="badge py-1 px-2 rounded font-semibold" style="background-color: #c6dbf2; color: #1E90FF; text-transform: uppercase;">Pending</span>
                @elseif($o->status_order === 'cancelled')
                    <span class="badge py-1 px-2 rounded font-semibold" style="background-color: #f0ccd0; color: #DC3545; text-transform: uppercase;">Cancelled</span>
                @else
                    <span class="badge py-1 px-2 rounded font-semibold" style="background-color: #cbe2d8; color: #4DAF84; text-transform: uppercase;">Success</span>
                @endif
            </td>
            <td class="py-6 px-4">
                {{ \Carbon\Carbon::parse($o->created_at)->translatedFormat('d F Y') }}
            </td>

            <!-- Aksi -->
            <td class="py-3 px-4">
                <a href="{{ route('order.show', $o->id_order) }}"
                   class="btn text-[#1E90FF] font-semibold bg-[#D3E9FF] py-2 px-4 rounded hover:bg-[#B1D4FF] hover:text-[#052D6E] transition">
                    Detail
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center py-6 text-gray-500">Tidak ada data order</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $order->links() }}
</div>
