@extends('layout.main')
@section('judul', 'Edit Data Order')

@section('content')
    <form method="post" action="{{ url('order/update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $order->id }}"/>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama', $order->nama) }}"
                                   name="nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Pakaian</label>
                            <input type="text"
                                   class="form-control @error('jenis_pakaian') is-invalid @enderror"
                                   value="{{ old('jenis_pakaian', $order->jenis_pakaian) }}"
                                   name="jenis_pakaian">
                            @error('jenis_pakaian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Layanan</label>
                            <input type="text"
                                   class="form-control @error('jenis_layanan') is-invalid @enderror"
                                   value="{{ old('jenis_layanan', $order->jenis_layanan) }}"
                                   name="jenis_layanan">
                            @error('jenis_layanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                      name="deskripsi">{{ old('deskripsi', $order->deskripsi) }}</textarea>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Berat (kg)</label>
                            <input type="number" 
                                   class="form-control @error('kg') is-invalid @enderror"
                                   value="{{ old('kg', $order->kg) }}"
                                   name="kg">
                            @error('kg')
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
