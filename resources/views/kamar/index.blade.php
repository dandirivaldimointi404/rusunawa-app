@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Kamar</h1>
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
                                <h3 class="card-title" style="margin: 0;">Data Kamar</h3>
                                <div>
                                    <a href="{{ route('kamar.create')}}" class="btn btn-outline-primary"
                                        style="float: right; margin: 0">Tambah Kamar</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Kamar</th>
                                            <th>Lantai</th>
                                            <th>Kapasitas</th>
                                            <th>Tarif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kamar as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nomor_kamar }}</td>
                                                <td>{{ $item->lantai }}</td>
                                                <td>{{ $item->kapasitas }}</td>
                                                <td>{{ 'Rp ' . number_format($item->tarif, 0, ',', '.') }}</td>


                                                <td class="text-center">
                                                    <form action="{{ route('kamar.destroy', $item->id) }}" method="POST"
                                                        class="delete-form">
                                                        <a href="{{ route('kamar.edit', $item->id) }}"
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
