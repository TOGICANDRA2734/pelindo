@extends('layouts.home')

@section('title', env('APP_NAME') . ' - SHIP REGISTRATION')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        SHIP REGISTRATION
                    </div>
                    <h2 class="page-title">
                        Detail
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                {{-- Dashboard Stats --}}
                <div class="col-12 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-3">No. Reg:</dt>
                                <dd class="col-3">{{ $data->no_reg }}</dd>

                                <dt class="col-3">Company:</dt>
                                <dd class="col-3">{{ $data->company }}</dd>

                                <dt class="col-3">NPWP:</dt>
                                <dd class="col-3">{{ $data->npwp }}</dd>

                                <dt class="col-3">No. PMKU:</dt>
                                <dd class="col-3">{{ $data->no_pmku }}</dd>

                                <dt class="col-3">S.I.U.P:</dt>
                                <dd class="col-3">{{ $data->siup }}</dd>

                                <dt class="col-3">PIC:</dt>
                                <dd class="col-3">{{ $data->pic }}</dd>

                                <dt class="col-3">PIC Email:</dt>
                                <dd class="col-3">{{ $data->pic_email }}</dd>

                                <dt class="col-3">Status:</dt>
                                <dd class="col-3">
                                    {!! $data->status_admin == 1
                                        ? "<span class='badge bg-green'>APPROVED</span>"
                                        : "<span class='badge bg-red'>WAITING APPROVAL</span>" !!}
                                </dd>

                            </dl>
                        </div>

                    </div>
                </div>
            </div>
            {{-- End: Dashboard Stats --}}


            {{-- Table --}}
            <div class="col-12 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered ship_documentation display nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Call Sign</th>
                                    <th>Reg Number</th>
                                    <th>Tipe Vessel</th>
                                    <th>Details</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End: Table --}}

            {{-- Detail --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-12 row">
                            {{-- Name Of Ship --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Name Of Ship</label>
                                <input type="text" class="form-control" disabled value="{{ $data->name_ship }}"
                                    name="name_ship" placeholder="Input Name Of Ship">
                            </div>

                            {{-- Of Ship --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Of Ship</label>
                                <input type="text" class="form-control" disabled value="{{ $data->of_ship }}"
                                    name="of_ship" placeholder="Input Of Ship">
                            </div>

                            {{-- Last Docking --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Last Docking</label>
                                <input type="date" class="form-control" disabled value="{{ $data->last_docking }}"
                                    name="last_docking" placeholder="Input Last Docking">
                            </div>

                            {{-- Trade Area --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Trade Area</label>
                                <input type="text" class="form-control" disabled value="{{ $data->trade_area }}"
                                    name="trade_area" placeholder="Input Trade Area">
                            </div>
                        </div>

                        <div class="col-12 row">
                            {{-- Distinctive Number Of Letter --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Distinctive Number Of Letter</label>
                                <input type="text" class="form-control" disabled value="{{ $data->dnol }}"
                                    name="dnol" placeholder="Input Distinctive Number Of Letter">
                            </div>

                            {{-- Gross Tonage --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Gross Tonage</label>
                                <input type="text" class="form-control" disabled value="{{ $data->gross_tonage }}"
                                    name="gross_tonage" placeholder="Input Gross Tonage">
                            </div>

                            {{-- Classification --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Classification</label>
                                <input type="text" class="form-control" disabled value="{{ $data->classification }}"
                                    name="classification" placeholder="Input Classification">
                            </div>

                            {{-- company --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">company</label>
                                <input type="text" class="form-control" disabled value="{{ $data->company_ship }}"
                                    name="company_ship" placeholder="Input company">
                            </div>
                        </div>

                        <div class="col-12 row">
                            {{-- Registry --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Registry</label>
                                <input type="text" class="form-control" disabled value="{{ $data->registry }}"
                                    name="registry" placeholder="Input Registry">
                            </div>

                            {{-- Keel Laid --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Keel Laid</label>
                                <input type="text" class="form-control" disabled value="{{ $data->keel_laid }}"
                                    name="keel_laid" placeholder="Input Keel Laid">
                            </div>

                            {{-- Galangan --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Galangan</label>
                                <input type="text" class="form-control" disabled value="{{ $data->galangan }}"
                                    name="galangan" placeholder="Input Galangan">
                            </div>

                            {{-- Dokumen Kapal --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Dokumen Kapal</label>
                                {{-- <a href="{{ route('pdf.view', ['filename' => '$data->dokumen_kapal']) }}" target="_blank">Open PDF</a> --}}
                                <a href="#"
                                    onclick="window.open('{{ asset('storage/dokumen_kapal/' . $data->dokumen_kapal) }}', '_blank');"
                                    class="btn btn-facebook w-100 btn-icon" aria-label="pdf">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-file-description" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                        </path>
                                        <path d="M9 17h6"></path>
                                        <path d="M9 13h6"></path>
                                    </svg>

                                </a>
                            </div>

                        </div>

                        <div class="col-12 row">

                            {{-- Effective Power --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Effective Power</label>
                                <input type="text" class="form-control" disabled value="{{ $data->effective_power }}"
                                    name="effective_power" placeholder="Input Effective Power">
                            </div>

                            {{-- Cert Expired --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Cert Expired</label>
                                <input type="date" class="form-control" disabled value="{{ $data->cert_expired }}"
                                    name="cert_expired" placeholder="Input Cert Expired">
                            </div>


                            {{-- Owner Address --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Owner Address</label>
                                <input type="text" class="form-control" disabled value="{{ $data->owner_address }}"
                                    name="owner_address" placeholder="Input Owner Address">
                            </div>


                            @if (
                                ($data->status_galangan == 1 && Auth::user()->role == 'admin') ||
                                    Auth::user()->role == 'mar_sur' ||
                                    (Auth::user()->role = 'mar_ins'))
                                {{-- Dokumen Proses Galangan --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <div style="display: flex; justify-content: space-between">
                                        <label class="form-label" style="display: inline-block">Proses Galangan</label>
                                        @if ($data->proses_galangan == '' || is_null($data->proses_galangan))
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-1">
                                                Tambah
                                            </a>
                                        @else
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-1">
                                                Ubah
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <a href="{{ route('pdf.view', ['filename' => '$data->dokumen_kapal']) }}" target="_blank">Open PDF</a> --}}
                                    <a href="#"
                                        onclick="window.open('{{ asset('storage/proses_galangan/' . $data->proses_galangan) }}', '_blank');"
                                        class="btn btn-twitter w-100 btn-icon" aria-label="pdf">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-description" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                            </path>
                                            <path d="M9 17h6"></path>
                                            <path d="M9 13h6"></path>
                                        </svg>

                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="col-12 row">
                            {{-- Engine No. --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Engine No.</label>
                                <input type="text" class="form-control" disabled value="{{ $data->engine_no }}"
                                    name="engine_no" placeholder="Input Engine No.">
                            </div>


                            {{-- Class Expired --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Class Expired</label>
                                <input type="date" class="form-control" disabled value="{{ $data->class_expired }}"
                                    name="class_expired" placeholder="Input Class Expired">
                            </div>

                            {{-- Main Engine --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Main Engine</label>
                                <input type="text" class="form-control" disabled value="{{ $data->main_engine }}"
                                    name="main_engine" placeholder="Input Main Engine">
                            </div>

                            @if (
                                ($data->status_doc == 1 && Auth::user()->role == 'admin') ||
                                    Auth::user()->role == 'mar_sur' ||
                                    (Auth::user()->role = 'mar_ins'))
                                {{-- Dokumen Proses End. --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <div style="display: flex; justify-content: space-between">
                                        <label class="form-label" style="display: inline-block">Sertifikat Kapal</label>
                                        @if ($data->sertifikat_doc == '' || is_null($data->sertifikat_doc))
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-2">
                                                Tambah
                                            </a>
                                        @else
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-2">
                                                Ubah
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <a href="{{ route('pdf.view', ['filename' => '$data->dokumen_kapal']) }}" target="_blank">Open PDF</a> --}}
                                    <a href="#"
                                        onclick="window.open('{{ asset('storage/sertifikat_doc/' . $data->sertifikat_doc) }}', '_blank');"
                                        class="btn btn-google w-100 btn-icon" aria-label="pdf">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-description" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                            </path>
                                            <path d="M9 17h6"></path>
                                            <path d="M9 13h6"></path>
                                        </svg>

                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="col-12 row">
                            {{-- Machine Number --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Machine Number</label>
                                <input type="text" class="form-control" disabled value="{{ $data->machine_number }}"
                                    name="machine_number" placeholder="Input Machine Number">
                            </div>

                            {{-- hull --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Hull</label>
                                <input type="text" class="form-control" disabled value="{{ $data->hull }}"
                                    name="hull" placeholder="Input Hull">
                            </div>

                            {{-- Ship Type --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Ship Type</label>
                                <input type="text" class="form-control" disabled value="{{ $data->ship_type }}"
                                    name="ship_type" placeholder="Input Ship Type">
                            </div>

                            @if (($data->status_end == 1 && (Auth::user()->role == 'admin') || Auth::user()->role == 'mar_sur' || (Auth::user()->role = 'mar_ins')))
                                {{-- Dokumen Sertifikat Dok. --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <div style="display: flex; justify-content: space-between">
                                        <label class="form-label" style="display: inline-block">Status Endorsment</label>
                                        @if ($data->proses_end == '' || is_null($data->proses_end))
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-3">
                                                Tambah
                                            </a>
                                        @else
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-3">
                                                Ubah
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <a href="{{ route('pdf.view', ['filename' => '$data->dokumen_kapal']) }}" target="_blank">Open PDF</a> --}}
                                    <a href="#"
                                        onclick="window.open('{{ asset('storage/proses_end/' . $data->proses_end) }}', '_blank');"
                                        class="btn btn-google w-100 btn-icon" aria-label="pdf">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-description" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                            </path>
                                            <path d="M9 17h6"></path>
                                            <path d="M9 13h6"></path>
                                        </svg>

                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-12 row">
                            @if (($data->status_laporan == 1 && (Auth::user()->role == 'admin') || Auth::user()->role == 'mar_sur' || (Auth::user()->role = 'mar_ins')))
                                {{-- Dokumen Sertifikat Dok. --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <div style="display: flex; justify-content: space-between">
                                        <label class="form-label" style="display: inline-block">Status Laporan </label>
                                        @if ($data->laporan == '' || is_null($data->laporan))
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-4">
                                                Tambah
                                            </a>
                                        @else
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-4">
                                                Ubah
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <a href="{{ route('pdf.view', ['filename' => '$data->dokumen_kapal']) }}" target="_blank">Open PDF</a> --}}
                                    <a href="#"
                                        onclick="window.open('{{ asset('storage/laporan/' . $data->laporan) }}', '_blank');"
                                        class="btn btn-google w-100 btn-icon" aria-label="pdf">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-description" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                            </path>
                                            <path d="M9 17h6"></path>
                                            <path d="M9 13h6"></path>
                                        </svg>

                                    </a>
                                </div>
                            @endif

                            @if (($data->status_sertifikat == 1 && (Auth::user()->role == 'admin') || Auth::user()->role == 'mar_sur' || (Auth::user()->role = 'mar_ins')))
                                {{-- Dokumen Sertifikat Dok. --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <div style="display: flex; justify-content: space-between">
                                        <label class="form-label" style="display: inline-block">Status Sertifikat Inspector </label>
                                        @if ($data->sertifikat_ins == '' || is_null($data->sertifikat_ins))
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-5">
                                                Tambah
                                            </a>
                                        @else
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report-5">
                                                Ubah
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <a href="{{ route('pdf.view', ['filename' => '$data->dokumen_kapal']) }}" target="_blank">Open PDF</a> --}}
                                    <a href="#"
                                        onclick="window.open('{{ asset('storage/sertifikat_ins/' . $data->sertifikat_ins) }}', '_blank');"
                                        class="btn btn-google w-100 btn-icon" aria-label="pdf">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-description" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                            </path>
                                            <path d="M9 17h6"></path>
                                            <path d="M9 13h6"></path>
                                        </svg>

                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            {{-- End: Detail --}}

            {{-- Admin Button Accept --}}
            @if (Auth::user()->role == 'admin' && $data->status_admin == 0)
                <div class="col-12 py-3">
                    <a href="{{ route('ship-approve', $data->id) }}" class="btn btn-success w-100 uppercase">
                        APPROVED
                    </a>
                </div>
            @endif


            {{-- End: Button Accept --}}


        </div>
    </div>
@endsection

@section('additional-js')
    <script type="text/javascript">
        var table;
        $(function() {
            table = $('.ship_documentation').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('ship-documentation.filter') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'call_sign',
                        name: 'call_sign'
                    },
                    {
                        data: 'reg_number',
                        name: 'reg_number'
                    },
                    {
                        data: 'type_vessel',
                        name: 'type_vessel'
                    },
                    {
                        data: 'details',
                        name: 'details',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                autoWidth: true,
            });
        });

        function openPdf(path) {
            window.open('/storage/' + encodeURIComponent(path), '_blank');
            // window.open("{{ asset('storage/') }}" + '/' + path);
        }
    </script>
@endsection

@section('content-modal-1')
    @if ($data->proses_galangan == '' || is_null($data->proses_galangan))
        <div class="modal-content">
            <form method="POST" action="{{ route('galangan.add', $data->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Proses Galangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Proses Galangan (.rar)</label>
                        <input type="file" class="form-control" name="proses_galangan"
                            placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Proses Galangan
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="modal-content">
            <form method="POST" action="{{ route('galangan.edit', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Proses Galangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Proses Galangan (.rar)</label>
                        <input type="file" class="form-control" name="proses_galangan"
                            placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Update
                    </button>
                </div>
            </form>
        </div>
    @endif
@endsection

@section('content-modal-2')
    @if ($data->sertifikat_doc == '' || is_null($data->sertifikat_doc))
        <div class="modal-content">
            <form method="POST" action="{{ route('sertifikat-doc.add', $data->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Proses Sertifikat Dok.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Proses Sertifikat Dok. (.rar)</label>
                        <input type="file" class="form-control" name="sertifikat_doc"
                            placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Proses Sertifikat Dok.
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="modal-content">
            <form method="POST" action="{{ route('sertifikat-doc.edit', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Proses Sertifikat Dok.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Proses Sertifikat Dok. (.rar)</label>
                        <input type="file" class="form-control" name="sertifikat_doc"
                            placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Update
                    </button>
                </div>
            </form>
        </div>
    @endif
@endsection


@section('content-modal-3')
    @if ($data->proses_end == '' || is_null($data->proses_end))
        <div class="modal-content">
            <form method="POST" action="{{ route('proses-end.add', $data->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Proses End.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Proses Proses End. (.rar)</label>
                        <input type="file" class="form-control" name="proses_end" placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Proses End.
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="modal-content">
            <form method="POST" action="{{ route('proses-end.edit', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Proses End.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Proses Proses End. (.rar)</label>
                        <input type="file" class="form-control" name="proses_end" placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Update
                    </button>
                </div>
            </form>
        </div>
    @endif
@endsection

@section('content-modal-4')
    @if ($data->laporan == '' || is_null($data->laporan))
        <div class="modal-content">
            <form method="POST" action="{{ route('laporan.add', $data->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Laporan Marine Insp.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Laporan Marine Insp. (.rar)</label>
                        <input type="file" class="form-control" name="laporan" placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Laporan Marine Insp.
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="modal-content">
            <form method="POST" action="{{ route('laporan.edit', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Laporan Marine Insp.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Laporan Marine Insp. (.rar)</label>
                        <input type="file" class="form-control" name="laporan" placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Update
                    </button>
                </div>
            </form>
        </div>
    @endif
@endsection

@section('content-modal-5')
    @if ($data->sertifikat_ins == '' || is_null($data->sertifikat_ins))
        <div class="modal-content">
            <form method="POST" action="{{ route('sertifikat.add', $data->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah sertifikat Marine Insp.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Sertifikat Marine Insp. (.rar)</label>
                        <input type="file" class="form-control" name="sertifikat_ins" placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Sertifikat Marine Insp.
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="modal-content">
            <form method="POST" action="{{ route('sertifikat.edit', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Sertifikat Marine Insp.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Sertifikat Marine Insp. (.rar)</label>
                        <input type="file" class="form-control" name="sertifikat_ins" placeholder="Masukkan foto(.rar)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Update
                    </button>
                </div>
            </form>
        </div>
    @endif
@endsection