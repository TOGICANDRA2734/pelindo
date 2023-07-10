@extends('layouts.app')

@section('css-optional')
    <link rel="stylesheet" href="{{asset('dist/css/tabler.min.css')}}">
@endsection

@section('content')
    <form action="{{route('tambahUser.postStep1')}}" method="POST" class="container-tight py-4">
        @csrf
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
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" autocomplete="off" name="username">
                </div>
                <div class="mb-2">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" autocomplete="off" name="password">
                </div>
                <div class="mb-2">
                    <label class="form-label">NIP/NIPY</label>
                    <input type="text" class="form-control" autocomplete="off" name="nip">
                </div>
                <div class="mb-2">
                    <label class="form-label">Tempat Lahir - Provinsi</label>
                    <select class="form-control" name="provinsi" id="provinsi">
                        
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
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                </div>
                <div class="mb-2">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="" selected disabled>Pilih</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <div class="col-4">
                <div class="progress">
                    <div class="progress-bar" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="visually-hidden">33% Complete</span>
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
                    $("#provinsi").append(options);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });

        // Handle province change event
        $("#provinsi").change(function () {
            var provinceId = $(this).val();
            $("#kota").empty().append("<option value=''>Loading cities...</option>");

            // Fetch cities based on the selected province
            $.ajax({
                url: "{{ url('/cities') }}" + "/" + provinceId,
                method: "GET",
                success: function (response) {
                    console.log(response.kota_kabupaten)
                    $("#kota").empty().append("<option value=''>Select a city</option>");

                    if (response.kota_kabupaten.length > 0) {
                        var options = "";
                        $.each(response.kota_kabupaten, function (key, city) {
                            options += "<option value='" + city.id + "'>" + city.nama + "</option>";
                        });
                        $("#kota").append(options);
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