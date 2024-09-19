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
                                                {{-- <td>{{ $item->status }}</td> --}}
                                                <!-- resources/views/tagihan.blade.php -->
                                                {{-- <td>
                                                    <form id="status-form-{{ $item->id }}"
                                                        action="{{ url('/tagihan/update-status/' . $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <select name="status" class="form-select"
                                                            onchange="submitForm({{ $item->id }})">
                                                            <option value="lunas"
                                                                {{ $item->status == 'lunas' ? 'selected' : '' }}>Lunas
                                                            </option>
                                                            <option value="belum lunas"
                                                                {{ $item->status == 'belum lunas' ? 'selected' : '' }}>Belum
                                                                Lunas</option>
                                                        </select>
                                                    </form>
                                                </td> --}}

                                                <td class="text-center">
                                                    <form id="status-form-{{ $item->id }}"
                                                        action="{{ url('/tagihan/update-status/' . $item->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <select name="status" class="form-control"
                                                            onchange="submitForm({{ $item->id }})">
                                                            <option value="belum lunas"
                                                                {{ $item->status == 'belum lunas' ? 'selected' : '' }}>Belum
                                                                Lunas</option>
                                                            <option value="lunas"
                                                                {{ $item->status == 'lunas' ? 'selected' : '' }}>Lunas
                                                            </option>
                                                        </select>
                                                    </form>
                                                </td>



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




                                                {{-- <td class="text-center">
                                                    @if ($item->penghuni->no_wa_pribadi)
                                                        <button class="btn btn-outline-success send-sms"
                                                            data-number="{{ $item->penghuni->no_wa_ortu }}">
                                                            <i class="fab fa-whatsapp"></i> No Wa Ortu
                                                        </button>
                                                    @endif
                                                </td> --}}

                                                {{-- <form action="{{ route('tagihan.send') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="jid" value="{{ $item->penghuni->no_wa_ortu }}@s.whatsapp.net">
                                                    <td class="text-center">
                                                        @if ($item->penghuni->no_wa_ortu)
                                                            <button type="submit" class="btn btn-outline-success">
                                                                <i class="fab fa-whatsapp"></i> No Wa Ortu
                                                            </button>
                                                        @endif
                                                    </td>
                                                </form> --}}

                                                <form action="{{ route('tagihan.send') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="jid"
                                                        value="{{ $item->penghuni->no_wa_ortu }}@s.whatsapp.net">
                                                    <input type="hidden" name="lantai"
                                                        value="{{ $item->penghuni->kamar->lantai }}">
                                                    <input type="hidden" name="nomor_kamar"
                                                        value="{{ $item->penghuni->kamar->nomor_kamar }}">
                                                    <input type="hidden" name="nama_penghuni"
                                                        value="{{ $item->penghuni->nama_penghuni }}">
                                                    <input type="hidden" name="total_tagihan"
                                                        value="{{ $item->total_tagihan }}">
                                                    <input type="hidden" name="tanggal_jatuh_tempo"
                                                        value="{{ $item->tanggal_jatuh_tempo }}"> 

                                                    <td class="text-center">
                                                        @if ($item->penghuni->no_wa_ortu)
                                                            <button type="submit" class="btn btn-outline-success">
                                                                <i class="fab fa-whatsapp"></i> No Wa Ortu
                                                            </button>
                                                        @endif
                                                    </td>
                                                </form>





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
