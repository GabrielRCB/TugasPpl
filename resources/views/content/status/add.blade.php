@extends('layout.main')
@section('judul', 'Tambah Data Status')

@section('content')
    <form method="post" action="{{ url('status/insert') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama') }}"
                                   name="nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="text"
                                   class="form-control @error('no_telepon') is-invalid @enderror"
                                   value="{{ old('no_telepon') }}"
                                   name="no_telepon">
                            @error('no_telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text"
                                   class="form-control @error('alamat') is-invalid @enderror"
                                   value="{{ old('alamat') }}"
                                   name="alamat">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pesanan</label>
                            <input type="date"
                                   class="form-control @error('tanggal_pesanan') is-invalid @enderror"
                                   value="{{ old('tanggal_pesanan') }}"
                                   name="tanggal_pesanan">
                            @error('tanggal_pesanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Layanan</label>
                            <input type="text"
                                   class="form-control @error('jenis_layanan') is-invalid @enderror"
                                   value="{{ old('jenis_layanan') }}"
                                   name="jenis_layanan">
                            @error('jenis_layanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Estimasi Waktu Selesai</label>
                            <input type="time"
                                   class="form-control @error('estimasi_waktu_selesai') is-invalid @enderror"
                                   value="{{ old('estimasi_waktu_selesai') }}"
                                   name="estimasi_waktu_selesai">
                            @error('estimasi_waktu_selesai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status Pesanan</label>
                            <input type="text"
                                   class="form-control @error('status_pesanan') is-invalid @enderror"
                                   value="{{ old('status_pesanan') }}"
                                   name="status_pesanan">
                            @error('status_pesanan')
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
