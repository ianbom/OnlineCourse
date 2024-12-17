<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwind.min.css">

<style>

    #materiTable td {
        border-bottom: 1px solid #ddd;
    }
</style>


<table id="materiTable" class="w-full whitespace-no-wrap">
    <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
            <th class="px-4 py-3">#</th>
            <th class="px-4 py-3">Nama Content</th>
            <th class="px-4 py-3">Nama Materi</th>
            <th class="px-4 py-3">Created At</th>
            <th class="px-4 py-3">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y">

    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwind.min.js"></script>

<script>
    $(document).ready(function () {
        $('#materiTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('materi.data') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name_content', name: 'name_content' },
                { data: 'name_materi', name: 'name_materi' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                },
                zeroRecords: "Tidak ada data ditemukan",
            },

        });
    });
</script>
