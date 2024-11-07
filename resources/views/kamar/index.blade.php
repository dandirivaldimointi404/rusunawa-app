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
                                @if (Auth::user()->level == 'admin')
                                    <div>
                                        <a href="{{ route('kamar.create') }}" class="btn btn-outline-primary"
                                            style="float: right; margin: 0">Tambah Kamar</a>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Kamar</th>
                                            <th>Lantai</th>
                                            <th>Kapasitas</th>
                                            <th>Sudah Terisi</th>
                                            <th>Tarif/Orang</th>
                                            <th>Total Tarif</th>
                                            @if (Auth::user()->level == 'admin')
                                                <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kamar as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nomor_kamar }}</td>
                                                <td>{{ $item->lantai }}</td>
                                                <td>{{ $item->kapasitas }}</td>
                                                <td>
                                                    @if ($item->penghuni_count >= $item->kapasitas)
                                                        <span class="badge bg-danger">Penuh
                                                            ({{ $item->penghuni_count }})
                                                        </spyan>
                                                    @else
                                                        <span class="badge bg-success">Tersedia
                                                            ({{ $item->penghuni_count }})</span>
                                                    @endif
                                                </td>
                                                <td>{{ 'Rp ' . number_format($item->tarif, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp ' . number_format($item->total_tarif, 0, ',', '.') }}</td>

                                                @if (Auth::user()->level == 'admin')
                                                    <td class="text-center">
                                                        <form action="{{ route('kamar.destroy', $item->id) }}"
                                                            method="POST" class="delete-form">
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
                                                @endif
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
