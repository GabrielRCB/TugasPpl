@extends('layout.main')
@section('judul', 'Data Status')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{ url('/status/add') }}">Tambah Data Status</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Jenis Layanan</th>
                                    <th>Estimasi Waktu Selesai</th>
                                    <th>Status Pesanan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = (($statuses->currentPage() - 1) * $statuses->perPage()) + 1;
                                @endphp
                                @foreach($statuses as $status)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $status->nama }}</td>
                                        <td>{{ $status->no_telepon }}</td>
                                        <td>{{ $status->alamat }}</td>
                                        <td>{{ $status->tanggal_pesanan }}</td>
                                        <td>{{ $status->jenis_layanan }}</td>
                                        <td>{{ $status->estimasi_waktu_selesai }}</td>
                                        <td>{{ $status->status_pesanan }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                               href="{{ url('/status/edit/' . $status->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    data-id-status="{{ $status->id }}"
                                                    data-name="{{ $status->nama }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $statuses->links() }}
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
                let idStatus = $(this).data('id-status');
                let name = $(this).data('name');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data status ${name}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/status/delete',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idStatus
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
