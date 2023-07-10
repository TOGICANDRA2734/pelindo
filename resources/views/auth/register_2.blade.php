@extends('layouts.app')

@section('css-optional')
    <link rel="stylesheet" href="{{asset('dist/css/tabler.min.css')}}">
@endsection

@section('content')
    <form action="{{route('tambahUser.postStep2')}}" method="POST" class="container-tight py-4" enctype="multipart/form-data">
        @csrf
        <div class="card card-md">
            <div class="card-body text-center py-2 p-sm-4">
                <i class="fa-solid fa-ship mb-n2" style="font-size: 50px;"></i> 
                <h1 class="mt-1">Selamat Datang di Galangan!</h1>
            </div>
            <div class="hr-text hr-text-center hr-text-spaceless">Data anda</div>
            <div class="card-body">
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
                    <select name="gol_darah" id="gol_darah" class="form-control">
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
                    <select name="provinsi_surat" id="provinsi_surat" class="form-control">
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Alamat Surat - Kab/Kota</label>
                    <select name="kota_surat" id="kota_surat" class="form-control">
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
                    <div class="progress-bar" style="width: 66%" role="progressbar" aria-valuenow="66" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="visually-hidden">66% Complete</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="btn-list justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js-optional')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Fetch provinces on page load
        $.ajax({
            url: "{{ route('provinces') }}",
            method: "GET",
            success: function (response) {

                if (response.provinsi.length > 0) {

                    var options = "";

                    $.each(response.provinsi, function (key, province) {

                        options += "<option value='" + province.id + "'>" + province.nama + "</option>";
                    });
                    $("#provinsi_surat").append(options);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });

        // Handle province change event
        $("#provinsi_surat").change(function () {
            var provinceId = $(this).val();
            $("#kota_surat").empty().append("<option value=''>Loading cities...</option>");

            // Fetch cities based on the selected province
            $.ajax({
                url: "{{ url('/cities') }}" + "/" + provinceId,
                method: "GET",
                success: function (response) {
                    console.log(response.kota_kabupaten)
                    $("#kota_surat").empty().append("<option value=''>Select a city</option>");

                    if (response.kota_kabupaten.length > 0) {
                        var options = "";
                        $.each(response.kota_kabupaten, function (key, city) {
                            options += "<option value='" + city.id + "'>" + city.nama + "</option>";
                        });
                        $("#kota_surat").append(options);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endsection