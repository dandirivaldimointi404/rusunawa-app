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
                                            <th class="text-center">Aksi</th>
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
                                                <td>{{ $item->status }}</td>

                                                {{-- <td class="text-center">
                                                    <button type="submit" class="btn btn-outline-success"><i class="btn-outline-primary"></i>Wa Penghuni</button>
                                                    <button type="submit" class="btn btn-outline-primary"><i class="btn-outline-primary"></i>Wa Orang Tua</button>
                                                </td> --}}

                                                {{-- <td>
                                                    <button id="whatsapp-btn" class="btn btn-success">Kirim Pesan</button>
                                                </td> --}}

                                                {{-- <td class="text-center">
                                                    @if ($item->penghuni->no_wa_pribadi)
                                                        <form action="{{ route('send.whatsapp') }}" method="POST"
                                                            style="display:inline;">
                                                            @csrf
                                                            <input type="hidden" name="number"
                                                                value="{{ $item->penghuni->no_wa_pribadi }}">
                                                            <input type="hidden" name="message"
                                                                value="Pesan default yang akan dikirim">
                                                            <button type="submit" class="btn btn-outline-success">
                                                                <i class="btn-outline-primary"></i> Wa Penghuni
                                                            </button>
                                                        </form>
                                                    @endif
                                                    @if ($item->penghuni->no_wa_ortu)
                                                        <form action="{{ route('send.whatsapp') }}" method="POST"
                                                            style="display:inline;">
                                                            @csrf
                                                            <input type="hidden" name="number"
                                                                value="{{ $item->penghuni->no_wa_ortu }}">
                                                            <input type="hidden" name="message"
                                                                value="Pesan default yang akan dikirim">
                                                            <button type="submit" class="btn btn-outline-primary">
                                                                <i class="btn-outline-primary"></i> Wa Orang Tua
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td> --}}




                                                <td class="text-center">
                                                    @if ($item->penghuni->no_wa_pribadi)
                                                        <button class="btn btn-outline-success send-sms"
                                                            data-number="{{ $item->penghuni->no_wa_pribadi }}">
                                                            <i class="fab fa-whatsapp"></i> Wa Penghuni
                                                        </button>
                                                    @endif
                                                    @if ($item->penghuni->no_wa_ortu)
                                                        <button class="btn btn-outline-primary send-sms"
                                                            data-number="{{ $item->penghuni->no_wa_ortu }}">
                                                            <i class="fab fa-whatsapp"></i> Wa Orang Tua
                                                        </button>
                                                    @endif
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
        $(document).ready(function() {
            // Event handler untuk tombol SMS
            $('.send-sms').click(function() {
                var phoneNumber = $(this).data('number'); // Ambil nomor dari data attribute

                // Kirim AJAX request ke backend untuk mengirim SMS
                $.ajax({
                    url: '{{ route('send.whatsapp') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF Token sebagai header
                    },
                    data: {
                        to: phoneNumber
                    },
                    success: function(response) {
                        alert(response.status); // Tampilkan pesan sukses atau gagal
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Tampilkan detail error di console
                        alert('Failed to send message');
                    }
                });
            });
        });
    </script>
@endsection
