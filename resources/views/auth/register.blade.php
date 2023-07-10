@extends('layouts.app')

@section('css-optional')
    <link rel="stylesheet" href="{{asset('dist/css/tabler.min.css')}}">
@endsection

@section('content')
    <div class="container-tight py-4">
        <div class="card card-md">
            <div class="card-body text-center py-2 p-sm-4">
                <i class="fa-solid fa-ship mb-n2" style="font-size: 50px;"></i> 
                <h1 class="mt-1">Selamat Datang di Galangan!</h1>
            </div>
            <div class="hr-text hr-text-center hr-text-spaceless">Data anda</div>
            <div class="card-body">
                <div class="mb-2">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" autocomplete="off" name="name">
                </div>
                <div class="mb-2">
                    <label class="form-label">NIP/NIPY</label>
                    <input type="text" class="form-control" autocomplete="off" name="nip">
                </div>
                <div class="mb-2">
                    <label class="form-label">Tempat Lahir - Provinsi</label>
                    <select class="form-control" name="provinsi" id="provinsi">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Tempat Lahir - Kab/Kota</label>
                    <select class="form-control" name="kota" id="kota">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Tanggal Lahir</label>
                    <select class="form-control" name="tgl_lahir" id="tgl_lahir">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="" selected disabled>Pilih</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Status Perkawinan</label>
                    <select class="form-control" name="status_perkawinan" id="status_perkawinan">
                        <option value="" selected disabled>Pilih</option>
                        <option value="kawin">Kawin</option>
                        <option value="belum kawin">Belum Kawin</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Agama</label>
                    <select class="form-control" name="agama" id="agama">
                        <option value="" selected disabled>Pilih</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="katholik">Katholik</option>
                        <option value="hindu">Hindu</option>
                        <option value="buddha">Buddha</option>
                        <option value="khonghuchu">Khonghuchu</option>
                        <option value="lainnya">lainnya</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Gol. Darah</label>
                    <select name="gol_darah" id="gol_darah">
                        <option value="" selected disabled>Pilih</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Alamat Surat-Menyurat</label>
                    <input type="text" name="alamat_surat" id="alamat_surat" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Alamat Surat - Provinsi</label>
                    <select name="provinsi_surat" id="provinsi_surat">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Alamat Surat - Kab/Kota</label>
                    <select name="kota_surat" id="kota_surat">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Kode Pos</label>
                    <input type="text" name="kode_pos" id="kode_pos" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Handphone</label>
                    <input type="text" name="hp" id="hp" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <div class="col-4">
                <div class="progress">
                    <div class="progress-bar" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="visually-hidden">25% Complete</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="btn-list justify-content-end">
                    
                    <a href="#" class="btn btn-primary">
                        Continue
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36"
                    alt=""></a>
        </div>
        <form method="POST" class="card" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Ajukan Akun </h2>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama" name="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Masukkan username" name="username">

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" placeholder="Password" autocomplete="off"
                            name="password">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password"
                                data-bs-original-title="Show password">
                                <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                    </path>
                                </svg>
                            </a>
                        </span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password-confirm">Konfirmasi Password</label>
                    <div class="input-group input-group-flat">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password"
                                data-bs-original-title="Show password">
                                <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                    </path>
                                </svg>
                            </a>
                        </span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pengajuan Akun Galangan</label>
                    <input type="file" class="form-control" name="pengajuan_stid">
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Ajukan Akun</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Sudah punya akun? <a href="{{ route('login') }}" tabindex="-1">Masuk</a>
        </div>
    </div> --}}
@endsection
