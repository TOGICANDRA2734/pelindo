@extends('layouts.app')

@section('css-optional')
    <link rel="stylesheet" href="{{asset('dist/css/tabler.min.css')}}">
@endsection

@section('content')
    <form action="{{route('tambahUser.postStep3')}}" method="POST" class="container-tight py-4" enctype="multipart/form-data">
        @csrf
        <div class="card card-md">
            <div class="card-body text-center py-2 p-sm-4">
                <i class="fa-solid fa-ship mb-n2" style="font-size: 50px;"></i> 
                <h1 class="mt-1">Selamat Datang di Galangan!</h1>
            </div>
            <div class="hr-text hr-text-center hr-text-spaceless">Data anda</div>
            <div class="card-body">
                <div class="mb-2">
                    <label class="form-label">Dok. Servewell Stable</label>
                    <input type="file" required name="dok_1" id="dok_1" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Dok. Konstruksi Servewell Stable</label>
                    <input type="file" required name="dok_2" id="dok_2" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Dok. Sertifikat Perlengkapan Stable</label>
                    <input type="file" required name="dok_3" id="dok_3" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Dok. Radio Serverwell Stable</label>
                    <input type="file" required name="dok_4" id="dok_4" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Dok. SNPP Serverwell Stable</label>
                    <input type="file" required name="dok_5" id="dok_5" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Dok. Surat Ukur Serverwell Stable</label>
                    <input type="file" required name="dok_6" id="dok_6" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Dok. Class BKI (Lambung) Serverwell Stable</label>
                    <input type="file" required name="dok_7" id="dok_7" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Dok. Class BKI (Mesin) Serverwell Stable</label>
                    <input type="file" required name="dok_8" id="dok_8" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Dok. Class BKI (Load Line) Serverwell Stable</label>
                    <input type="file" required name="dok_9" id="dok_9" class="form-control">
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <div class="col-4">
                <div class="progress">
                    <div class="progress-bar" style="width: 88%" role="progressbar" aria-valuenow="88" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="visually-hidden">88% Complete</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="btn-list justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        Daftar
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

