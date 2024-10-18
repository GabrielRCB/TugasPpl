@extends('layout.main')
@section('judul', 'Edit Data Customer')

@section('content')
    <form method="post" action="{{ url('customer/update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $customer->id }}"/>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama', $customer->nama) }}"
                                   name="nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text"
                                   class="form-control @error('alamat') is-invalid @enderror"
                                   value="{{ old('alamat', $customer->alamat) }}"
                                   name="alamat">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="text"
                                   class="form-control @error('no_telepon') is-invalid @enderror"
                                   value="{{ old('no_telepon', $customer->no_telepon) }}"
                                   name="no_telepon">
                            @error('no_telepon')
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
