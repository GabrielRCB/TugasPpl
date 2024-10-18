@extends('layout.main')
@section('judul', 'Data Customer')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{ url('/customer/add') }}">Tambah Data Customer</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = (($customers->currentPage() - 1) * $customers->perPage()) + 1;
                                @endphp
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $customer->nama }}</td>
                                        <td>{{ $customer->alamat }}</td>
                                        <td>{{ $customer->no_telepon }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                               href="{{ url('/customer/edit/' . $customer->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    data-id-customer="{{ $customer->id }}"
                                                    data-name="{{ $customer->nama }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $customers->links() }}
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
                let idCustomer = $(this).data('id-customer');
                let name = $(this).data('name');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data ${name}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/customer/delete',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idCustomer
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload();
                                    })
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
