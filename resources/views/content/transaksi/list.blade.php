@extends('layout.main')
@section('judul', 'Data Transaksi')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{ url('/transaksi/add') }}">Tambah Data Transaksi</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status Transaksi</th>
                                    <th>Total Biaya</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = (($transaksis->currentPage() - 1) * $transaksis->perPage()) + 1;
                                @endphp
                                @foreach($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $transaksi->nama }}</td>
                                        <td>{{ $transaksi->tanggal_pesanan }}</td>
                                        <td>{{ $transaksi->tanggal_selesai }}</td>
                                        <td>{{ $transaksi->status_transaksi }}</td>
                                        <td>Rp {{ number_format($transaksi->total_biaya, 0, ',', '.') }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                               href="{{ url('/transaksi/edit/' . $transaksi->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    data-id-transaksi="{{ $transaksi->id }}"
                                                    data-name="{{ $transaksi->nama }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $transaksis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function () {
            $('.btn-hapus').on('click', function () {
                let idTransaksi = $(this).data('id-transaksi');
                let name = $(this).data('name');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data transaksi ${name}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/transaksi/delete',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idTransaksi
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload();
                                    });
                            },
                            error: function () {
                                Swal.fire('Gagal', 'Terjadi kesalahan ketika hapus data', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
