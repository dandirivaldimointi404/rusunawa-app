@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Akun</h1>
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
                                <h3 class="card-title" style="margin: 0;">Data Akun</h3>
                                <div>
                                    <a href="{{ route('akun.create')}}" class="btn btn-outline-primary"
                                        style="float: right; margin: 0">Tambah Akun</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($akun as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->level }}</td>

                                                <td class="text-center">
                                                    <form action="{{ route('akun.destroy', $item->id) }}" method="POST"
                                                        class="delete-form">
                                                        <a href="{{ route('akun.edit', $item->id) }}"
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
