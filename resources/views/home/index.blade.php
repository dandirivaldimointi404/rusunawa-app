@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Header Section -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Beranda</li>
                        </ol>
                    </div>
                </div>
                <!-- Banner Image -->
                {{-- <img src="{{ asset('assets/foto5.jpeg') }}" class="img-fluid rounded shadow-sm" style="height: 250px; object-fit: cover;"> --}}

            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Total Kamar -->
                    <div class="col-lg-6 col-12 mb-3">
                        <div class="small-box bg-info shadow-lg rounded">
                            <div class="inner">
                                <h3 class="text-white">{{ $kamar }}</h3>
                                <p class="text-white">Total Kamar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cube"></i>
                            </div>
                            <a href="{{ route('kamar.index') }}" class="small-box-footer text-white">Cek Kamar Kosong <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Total Penghuni -->
                    <div class="col-lg-6 col-12 mb-3">
                        <div class="small-box bg-success shadow-lg rounded">
                            <div class="inner">
                                <h3 class="text-white">{{ $penghuni }}</h3>
                                <p class="text-white">Total Penghuni</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <!-- Add link if needed -->
                            <!-- <a href="{{ route('penghuni.index') }}" class="small-box-footer text-white">Lihat Penghuni <i class="fas fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gambar-gambar di bawah -->
        <div class="container-fluid">
            <div class="container p-3">
                <img src="{{ asset('assets/foto5.jpeg') }}" class="img-fluid rounded shadow-sm"
                    style="width: 100%; height: 200px; object-fit: cover;">

            </div>
            <div class="row">
                <!-- Gambar 1 -->
                <div class="col-md-6 col-12 mb-3">
                    <img src="{{ asset('assets/foto1.jpeg') }}" class="img-fluid rounded shadow-sm" alt="Gambar 1">
                </div>
                <!-- Gambar 2 -->
                <div class="col-md-6 col-12 mb-3">
                    <img src="{{ asset('assets/foto2.jpeg') }}" class="img-fluid rounded shadow-sm" alt="Gambar 2">
                </div>
                <!-- Gambar 3 -->
                <div class="col-md-6 col-12 mb-3">
                    <img src="{{ asset('assets/foto3.jpeg') }}" class="img-fluid rounded shadow-sm" alt="Gambar 3">
                </div>
                <!-- Gambar 4 -->
                <div class="col-md-6 col-12 mb-3">
                    <img src="{{ asset('assets/foto4.jpeg') }}" class="img-fluid rounded shadow-sm" alt="Gambar 4">
                </div>
            </div>
        </div>
    </div>
@endsection
