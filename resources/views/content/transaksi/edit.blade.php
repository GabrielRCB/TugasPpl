@extends('layout.main')
@section('judul', 'Edit Data Transaksi')

@section('content')
    <form method="post" action="{{ url('transaksi/update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $transaksi->id }}"/>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama', $transaksi->nama) }}"
                                   name="nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Pesanan</label>
                            <input type="date"
                                   class="form-control @error('tanggal_pesanan') is-invalid @enderror"
                                   value="{{ old('tanggal_pesanan', $transaksi->tanggal_pesanan) }}"
                                   name="tanggal_pesanan">
                            @error('tanggal_pesanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Selesai</label>
                            <input type="date"
                                   class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                   value="{{ old('tanggal_selesai', $transaksi->tanggal_selesai) }}"
                                   name="tanggal_selesai">
                            @error('tanggal_selesai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Status Transaksi</label>
                            <input type="text"
                                   class="form-control @error('status_transaksi') is-invalid @enderror"
                                   value="{{ old('status_transaksi', $transaksi->status_transaksi) }}"
                                   name="status_transaksi">
                            @error('status_transaksi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Total Biaya</label>
                            <input type="number"
                                   class="form-control @error('total_biaya') is-invalid @enderror"
                                   value="{{ old('total_biaya', $transaksi->total_biaya) }}"
                                   name="total_biaya">
                            @error('total_biaya')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
