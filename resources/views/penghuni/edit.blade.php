@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Data Penghuni</h1>
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
                                <h3 class="card-title">Edit Data Penghuni</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('penghuni.update', $penghuni->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Masukan Nama Lengkap"
                                                value="{{ old('name', $penghuni->user->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="username">NIM</label>
                                            <input type="text"
                                                   class="form-control @error('username') is-invalid @enderror"
                                                   id="username"
                                                   name="username"
                                                   placeholder="Masukan NIM"
                                                   value="{{ old('username', $penghuni->user->username) }}">
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                   

                                    <div class="row">
                                        <div class="form-group col-lg-6" hidden>
                                            <label>Level</label>
                                            <select class="form-control" style="width: 100%;" name="level" id="level"
                                                disabled>
                                                <option value="penghuni"
                                                    {{ $penghuni->level == 'penghuni' ? 'selected' : '' }}>Penghuni</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" placeholder="Password"
                                                value="{{ old('password') }}">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6" style="display: none">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" name="alamat" placeholder="Masukkan Alamat"
                                                value="{{ old('alamat', $penghuni->alamat) }}">
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="no_wa_ortu">No WA Orang Tua</label>
                                            <input type="number"
                                                class="form-control @error('no_wa_ortu') is-invalid @enderror"
                                                id="no_wa_ortu" name="no_wa_ortu" placeholder="No WA Orang Tua"
                                                value="{{ old('no_wa_ortu', $penghuni->no_wa_ortu) }}">
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
                                                name="tgl_masuk"
                                                value="{{ old('tgl_masuk', \Carbon\Carbon::parse($penghuni->tgl_masuk)->format('Y-m-d\TH:i')) }}">

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="kamar_id">Kamar</label>
                                            <select class="form-control @error('kamar_id') is-invalid @enderror"
                                                id="kamar_id" name="kamar_id">
                                                <option value="" disabled>Pilih Kamar</option>
                                                @foreach ($kamar as $kam)
                                                    <option value="{{ $kam->id }}"
                                                        {{ old('kamar_id', $penghuni->kamar_id) == $kam->id ? 'selected' : '' }}>
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

    <script>
        document.getElementById('username').addEventListener('input', function() {
            document.getElementById('password').value = this.value;
        });
    </script>
@endsection
