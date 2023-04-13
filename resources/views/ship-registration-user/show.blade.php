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
                                <input type="text" class="form-control" disabled value="{{$data->name_ship}}" name="name_ship" placeholder="Input Name Of Ship">
                            </div>

                            {{-- Of Ship --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Of Ship</label>
                                <input type="text" class="form-control" disabled value="{{$data->of_ship}}" name="of_ship" placeholder="Input Of Ship">
                            </div>

                            {{-- Last Docking --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Last Docking</label>
                                <input type="date" class="form-control" disabled value="{{$data->last_docking}}" name="last_docking"
                                    placeholder="Input Last Docking">
                            </div>

                            {{-- Trade Area --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Trade Area</label>
                                <input type="text" class="form-control" disabled value="{{$data->trade_area}}" name="trade_area" placeholder="Input Trade Area">
                            </div>
                        </div>

                        <div class="col-12 row">
                            {{-- Distinctive Number Of Letter --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Distinctive Number Of Letter</label>
                                <input type="text" class="form-control" disabled value="{{$data->dnol}}" name="dnol"
                                    placeholder="Input Distinctive Number Of Letter">
                            </div>

                            {{-- Gross Tonage --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Gross Tonage</label>
                                <input type="text" class="form-control" disabled value="{{$data->gross_tonage}}" name="gross_tonage"
                                    placeholder="Input Gross Tonage">
                            </div>

                            {{-- Classification --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Classification</label>
                                <input type="text" class="form-control" disabled value="{{$data->classification}}" name="classification"
                                    placeholder="Input Classification">
                            </div>

                            {{-- company --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">company</label>
                                <input type="text" class="form-control" disabled value="{{$data->company_ship}}" name="company_ship" placeholder="Input company">
                            </div>
                        </div>

                        <div class="col-12 row">
                            {{-- Registry --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Registry</label>
                                <input type="text" class="form-control" disabled value="{{$data->registry}}" name="registry" placeholder="Input Registry">
                            </div>

                            {{-- Keel Laid --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Keel Laid</label>
                                <input type="text" class="form-control" disabled value="{{$data->keel_laid}}" name="keel_laid" placeholder="Input Keel Laid">
                            </div>

                            {{-- Galangan --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Galangan</label>
                                <input type="text" class="form-control" disabled value="{{$data->galangan}}" name="galangan" placeholder="Input Galangan">
                            </div>

                        </div>

                        <div class="col-12 row">

                            {{-- Effective Power --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Effective Power</label>
                                <input type="text" class="form-control" disabled value="{{$data->effective_power}}" name="effective_power"
                                    placeholder="Input Effective Power">
                            </div>

                            {{-- Cert Expired --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Cert Expired</label>
                                <input type="date" class="form-control" disabled value="{{$data->cert_expired}}" name="cert_expired"
                                    placeholder="Input Cert Expired">
                            </div>


                            {{-- Owner Address --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Owner Address</label>
                                <input type="text" class="form-control" disabled value="{{$data->owner_address}}" name="owner_address"
                                    placeholder="Input Owner Address">
                            </div>
                        </div>

                        <div class="col-12 row">
                            {{-- Engine No. --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Engine No.</label>
                                <input type="text" class="form-control" disabled value="{{$data->engine_no}}" name="engine_no"
                                    placeholder="Input Engine No.">
                            </div>


                            {{-- Class Expired --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Class Expired</label>
                                <input type="date" class="form-control" disabled value="{{$data->class_expired}}" name="class_expired"
                                    placeholder="Input Class Expired">
                            </div>

                            {{-- Main Engine --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Main Engine</label>
                                <input type="text" class="form-control" disabled value="{{$data->main_engine}}" name="main_engine"
                                    placeholder="Input Main Engine">
                            </div>
                        </div>

                        <div class="col-12 row">
                            {{-- Machine Number --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Machine Number</label>
                                <input type="text" class="form-control" disabled value="{{$data->machine_number}}" name="machine_number"
                                    placeholder="Input Machine Number">
                            </div>

                            {{-- hull --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Hull</label>
                                <input type="text" class="form-control" disabled value="{{$data->hull}}" name="hull" placeholder="Input Hull">
                            </div>

                            {{-- Ship Type --}}
                            <div class="mb-3 col-12 col-sm-3">
                                <label class="form-label">Ship Type</label>
                                <input type="text" class="form-control" disabled value="{{$data->ship_type}}" name="ship_type"
                                    placeholder="Input Ship Type">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- End: Detail --}}

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
