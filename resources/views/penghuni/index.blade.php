@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Penghuni</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin: 0;">Data Penghuni</h3>
                                <div>
                                    <a href="{{ route('penghuni.create')}}" class="btn btn-outline-primary"
                                        style="float: right; margin: 0">Tambah Penghuni</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Penghuni</th>
                                            <th>Kamar</th>
                                            <th>Alamat</th>
                                            <th>No Primadi</th>
                                            <th>No Ortu</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penghuni as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->user->username }}</td>
                                                <td>{{ $item->nama_penghuni }}</td>
                                                <td>{{ $item->kamar->nomor_kamar }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->no_wa_pribadi }}</td>
                                                <td>{{ $item->no_wa_ortu }}</td>
                                                <td>{{ $item->tgl_masuk }}</td>

                                                <td class="text-center">
                                                    <form action="{{ route('penghuni.destroy', $item->id) }}" method="POST"
                                                        class="delete-form">
                                                        <a href="{{ route('penghuni.edit', $item->id) }}"
                                                            class="btn btn-outline-primary"><i
                                                                class="ti ti-edit"></i>Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            data-id="{{ $item->id }}"><i
                                                                class="btn-outline-primary"></i>Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
