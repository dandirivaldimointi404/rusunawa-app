@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Data Kamar</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Data Kamar</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('kamar.update', $kamar->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="nomor_kamar">Nomor Kamar</label>
                                            <input type="text" class="form-control @error('nomor_kamar') is-invalid @enderror"
                                                id="nomor_kamar" name="nomor_kamar" placeholder="Masukkan Nomor Kamar"
                                                value="{{ old('nomor_kamar', $kamar->nomor_kamar) }}">
                                            @error('nomor_kamar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="lantai">Lantai</label>
                                            <select class="form-control @error('lantai') is-invalid @enderror"
                                                id="lantai" name="lantai">
                                                <option value="">Pilih Lantai</option>
                                                @for ($i = 1; $i <= 3; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ old('lantai', $kamar->lantai) == $i ? 'selected' : '' }}>
                                                        Lantai {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('lantai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="kapasitas">Kapasitas Penghuni</label>
                                            <input type="number" class="form-control @error('kapasitas') is-invalid @enderror"
                                                id="kapasitas" name="kapasitas" placeholder="Masukkan Kapasitas Penghuni"
                                                value="{{ old('kapasitas', $kamar->kapasitas) }}">
                                            @error('kapasitas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tarif">Tarif Kamar Per Orang</label>
                                            <input type="number" class="form-control @error('tarif') is-invalid @enderror"
                                                id="tarif" name="tarif" placeholder="Masukkan Tarif Kamar Per Orang"
                                                value="{{ old('tarif', $kamar->tarif) }}">
                                            @error('tarif')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="tarif">Total Tarif Kamar</label>
                                            <input type="number" class="form-control @error('tarif') is-invalid @enderror"
                                                id="total_tarif" name="total_tarif" placeholder="Masukkan Total Tarif Kamar"
                                                value="{{ old('total_tarif', $kamar->tarif) }}">
                                            @error('total_tarif')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="float: right">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
