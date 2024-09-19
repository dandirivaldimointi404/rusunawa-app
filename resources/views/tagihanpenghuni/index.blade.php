@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Tagihan</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin: 0;">Data Tagihan</h3>
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
                                            <th>Total Tagihan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tagihan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Lantai {{ $item->penghuni->kamar->lantai }} | Kamar
                                                    {{ $item->penghuni->kamar->nomor_kamar }}</td>
                                                <td>{{ $item->penghuni->nama_penghuni }}</td>
                                                <td>Rp. {{ number_format($item->total_tagihan, 0, ',', '.') }}</td>
                                                <td>
                                                    <span
                                                        class="{{ $item->status == 'lunas' ? 'badge bg-primary rounded fs-100' : 'badge bg-danger rounded fs-100' }}">
                                                        {{ $item->status }}
                                                    </span>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.send-message');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const number = button.getAttribute('data-number');
                    const message = 'Hello there!';

                    // Tambahkan pesan log di console
                    console.log('Mengirim pesan ke nomor:', number);
                    console.log('Pesan:', message);

                    fetch('/send-whatsapp', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                jid: number + '@s.whatsapp.net',
                                message: message
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok.');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response:', data);
                            alert('Message sent successfully!');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Failed to send message. Check console for details.');
                        });

                });
            });
        });
    </script>
@endsection
