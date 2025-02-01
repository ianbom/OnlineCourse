<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Table</title>
    <style>
        /* General table styling */
        .responsive-table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            background-color: white;
            border: 2px solid #F58A44;
            border-radius: 16px;
            overflow: hidden;
        }

        .responsive-table th,
        .responsive-table td {
            text-align: center;
            padding: 1rem;
            border: none;
        }

        .responsive-table th {
            background-color: #F58A44;
            color: #fff;
            text-transform: uppercase;
            font-size: 0.875rem;
            font-weight: bold;
        }

        .responsive-table tbody tr {
            transition: background-color 0.2s ease;
        }

        .responsive-table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .badge {
            display: inline-block;
            font-size: 0.75rem;
            text-transform: uppercase;
        }

        .btn {
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #FDE4D3;
            color: #6F2E03;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .responsive-table th,
            .responsive-table td {
                padding: 0.75rem;
            }

            .responsive-table th:nth-child(3),
            .responsive-table td:nth-child(3),
            .responsive-table th:nth-child(4),
            .responsive-table td:nth-child(4),
            .responsive-table th:nth-child(5),
            .responsive-table td:nth-child(5) {
                display: none;
            }
        }
    </style>
</head>

<body>
    <table class="responsive-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Package Name</th>
                <th>Total Payment</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($order as $o)
            <tr class="hover:bg-gray-50 transition-colors text-[#979797] font-medium">
                <td>{{ $o->id_order }}</td>
                <td>{{ $o->name_bundle }}</td>
                <td>Rp{{ number_format($o->price_total, 0, ',', '.') }}</td>
                <td>
                    @if($o->status_order === 'pending')
                        <span class="badge py-1 px-2 rounded font-semibold" style="background-color: #FDE4D3; color: #F58A44;">Pending</span>
                    @elseif($o->status_order === 'cancelled')
                        <span class="badge py-1 px-2 rounded font-semibold" style="background-color: #f0ccd0; color: #DC3545;">Cancelled</span>
                    @else
                        <span class="badge py-1 px-2 rounded font-semibold" style="background-color: #cbe2d8; color: #4DAF84;">Success</span>
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($o->created_at)->translatedFormat('d F Y') }}</td>
                <td>
                    <a href="{{ route('order.show', $o->id_order) }}" class="btn text-[#F58A44] font-semibold bg-[#FDE4D3] py-2 px-4 rounded hover:bg-[#FDE4D3] hover:text-[#6F2E03] transition">
                        Detail
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-6 text-center text-gray-500">No data found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
