@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pelunasan</h1>
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
                                <h3 class="card-title" style="margin: 0;">Data Pelunasan</h3>
                                {{-- <div>
                                    <a href="{{ route('akun.create')}}" class="btn btn-outline-primary"
                                        style="float: right; margin: 0">Tambah Akun</a>
                                </div> --}}
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor kamar</th>
                                            <th>Penghuni</th>
                                            <th>Tanggal Pembayaran</th>
                                            {{-- <th>Tagihan</th> --}}
                                            <th>Status</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tagihan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Lantai {{ $item->penghuni->kamar->lantai }} | Kamar {{ $item->penghuni->kamar->nomor_kamar }}</td>
                                                <td>{{ $item->penghuni->nama_penghuni }}</td>
                                                {{-- <td>{{ $item->tgl_pembayaran ? $item->tgl_pembayaran->format('d-m-Y') : 'Belum Dibayar' }}</td> --}}
                                                <td>Rp {{ number_format($item->total_tagihan, 0, ',', '.') }}</td>
                                                <td>{{ $item->status }}</td>
{{-- 
                                                <td class="text-center">
                                                    <form action="{{ route('tagihan.destroy', $item->id) }}" method="POST"
                                                        class="delete-form">
                                                        <a href="{{ route('tagihan.edit', $item->id) }}"
                                                            class="btn btn-outline-primary"><i
                                                                class="ti ti-edit"></i>Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td> --}}
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
