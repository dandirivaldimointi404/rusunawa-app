@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tamabah Data Penghuni</h1>
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
                                <h3 class="card-title">Tambah Data Penghuni</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('penghuni.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Masukan Nama Lengkap"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror" id="username"
                                                name="username" placeholder="Masukan Username"
                                                value="{{ old('username') }}">
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control" style="width: 100%;" name="level" id="level"
                                            disabled>
                                            <option value="penghuni">Penghuni</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="nama_penghuni">Nama Penghuni</label>
                                            <input type="text"
                                                class="form-control @error('nama_penghuni') is-invalid @enderror"
                                                id="nama_penghuni" name="nama_penghuni" placeholder="Masukkan Nama Penghuni"
                                                value="{{ old('nama_penghuni') }}">
                                            @error('nama_penghuni')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" name="alamat" placeholder="Masukkan Alamat"
                                                value="{{ old('alamat') }}">
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="no_wa_pribadi">No WA Pribadi</label>
                                            <input type="text"
                                                class="form-control @error('no_wa_pribadi') is-invalid @enderror"
                                                id="no_wa_pribadi" name="no_wa_pribadi" placeholder="No WA Pribadi"
                                                value="{{ old('no_wa_pribadi') }}">
                                            @error('no_wa_pribadi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="no_wa_ortu">No WA Orang Tua</label>
                                            <input type="text"
                                                class="form-control @error('no_wa_ortu') is-invalid @enderror"
                                                id="no_wa_ortu" name="no_wa_ortu" placeholder="No WA Orang Tua"
                                                value="{{ old('no_wa_ortu') }}">
                                            @error('no_wa_ortu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="tgl_masuk">Tanggal Masuk</label>
                                            <input type="datetime-local"
                                                class="form-control @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk"
                                                name="tgl_masuk" value="{{ old('tgl_masuk') }}">
                                            @error('tgl_masuk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="kamar_id">Kamar</label>
                                            <select class="form-control @error('kamar_id') is-invalid @enderror"
                                                id="kamar_id" name="kamar_id">
                                                <option value="" disabled selected>Pilih Kamar</option>
                                                @foreach ($kamar as $kam)
                                                    <option value="{{ $kam->id }}"
                                                        {{ old('kamar_id') == $kam->id ? 'selected' : '' }}>
                                                        {{ $kam->nomor_kamar }}

                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kamar_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
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
