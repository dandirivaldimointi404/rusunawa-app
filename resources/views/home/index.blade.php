@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
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
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $kamar }}</h3>
                                <p>Total Kamar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cube"></i>
                            </div>
                            <a href="{{ route('kamar.index')}}" class="small-box-footer">Cek Kamar Kosong <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $penghuni }}</h3>

                                <p>Total Penghuni</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
