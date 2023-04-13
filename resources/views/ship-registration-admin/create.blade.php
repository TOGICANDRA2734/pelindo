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
                        Transaksi
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <form action="{{ route('ship-registration-user.store') }}" method="POST" class="row row-deck row-cards">
                @csrf
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            {{-- Company --}}
                            <div class="mb-3 row">
                                <label class="form-label">Select Company</label>
                                <select class="form-select" name="company">
                                    <option value="1">Company A</option>
                                    <option value="2">Company B</option>
                                    <option value="3">Company C</option>
                                </select>
                            </div>

                            {{-- NPWP --}}
                            <div class="mb-3 row">
                                <label class="form-label">NPWP</label>
                                <input type="text" class="form-control" name="npwp" placeholder="Input npwp">
                            </div>

                            {{-- no_pmku --}}
                            <div class="mb-3 row">
                                <label class="form-label">No. PMKU</label>
                                <input type="text" class="form-control" name="no_pmku" placeholder="Input No. PMKU">
                            </div>

                            {{-- siup --}}
                            <div class="mb-3 row">
                                <label class="form-label">S.I.U.P.</label>
                                <input type="text" class="form-control" name="siup" placeholder="Input S.I.U.P.">
                            </div>

                            {{-- pic --}}
                            <div class="mb-3 row">
                                <label class="form-label">PIC</label>
                                <input type="text" class="form-control" name="pic" placeholder="Input PIC">
                            </div>

                            {{-- pic_email --}}
                            <div class="mb-3 row">
                                <label class="form-label">PIC Email</label>
                                <input type="email" class="form-control" name="pic_email" placeholder="Input PIC Email">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-12 row">
                                {{-- Name Of Ship --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Name Of Ship</label>
                                    <input type="text" class="form-control" name="name_ship"
                                        placeholder="Input Name Of Ship">
                                </div>

                                {{-- Of Ship --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Of Ship</label>
                                    <input type="text" class="form-control" name="of_ship" placeholder="Input Of Ship">
                                </div>

                                {{-- Last Docking --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Last Docking</label>
                                    <input type="date" class="form-control" name="last_docking"
                                        placeholder="Input Last Docking">
                                </div>

                                {{-- Trade Area --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Trade Area</label>
                                    <input type="text" class="form-control" name="trade_area"
                                        placeholder="Input Trade Area">
                                </div>
                            </div>

                            <div class="col-12 row">
                                {{-- Distinctive Number Of Letter --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Distinctive Number Of Letter</label>
                                    <input type="text" class="form-control" name="dnol" placeholder="Input Distinctive Number Of Letter">
                                </div>

                                {{-- Gross Tonage --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Gross Tonage</label>
                                    <input type="text" class="form-control" name="gross_tonage"
                                        placeholder="Input Gross Tonage">
                                </div>

                                {{-- Classification --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Classification</label>
                                    <input type="text" class="form-control" name="classification" placeholder="Input Classification">
                                </div>

                                {{-- company --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">company</label>
                                    <input type="text" class="form-control" name="company_ship"
                                        placeholder="Input company">
                                </div>
                            </div>

                            <div class="col-12 row">
                                {{-- Registry --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Registry</label>
                                    <input type="text" class="form-control" name="registry"
                                        placeholder="Input Registry">
                                </div>

                                {{-- Keel Laid --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Keel Laid</label>
                                    <input type="text" class="form-control" name="keel_laid"
                                        placeholder="Input Keel Laid">
                                </div>

                                {{-- Galangan --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Galangan</label>
                                    <input type="text" class="form-control" name="galangan"
                                        placeholder="Input Galangan">
                                </div>

                            </div>

                            <div class="col-12 row">

                                {{-- Effective Power --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Effective Power</label>
                                    <input type="text" class="form-control" name="effective_power"
                                        placeholder="Input Effective Power">
                                </div>

                                {{-- Cert Expired --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Cert Expired</label>
                                    <input type="date" class="form-control" name="cert_expired"
                                        placeholder="Input Cert Expired">
                                </div>


                                {{-- Owner Address --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Owner Address</label>
                                    <input type="text" class="form-control" name="owner_address"
                                        placeholder="Input Owner Address">
                                </div>
                            </div>

                            <div class="col-12 row">
                                {{-- Engine No. --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Engine No.</label>
                                    <input type="text" class="form-control" name="engine_no"
                                        placeholder="Input Engine No.">
                                </div>


                                {{-- Class Expired --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Class Expired</label>
                                    <input type="date" class="form-control" name="class_expired"
                                        placeholder="Input Class Expired">
                                </div>

                                {{-- Main Engine --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Main Engine</label>
                                    <input type="text" class="form-control" name="main_engine"
                                        placeholder="Input Main Engine">
                                </div>
                            </div>

                            <div class="col-12 row">
                                {{-- Machine Number --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Machine Number</label>
                                    <input type="text" class="form-control" name="machine_number"
                                        placeholder="Input Machine Number">
                                </div>

                                {{-- hull --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Hull</label>
                                    <input type="text" class="form-control" name="hull" placeholder="Input Hull">
                                </div>

                                {{-- Ship Type --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Ship Type</label>
                                    <input type="text" class="form-control" name="ship_type"
                                        placeholder="Input Ship Type">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-ghost-primary active w-100">Simpan</button>
                </div>


                <div class="container">
                    <div class="card">
                        <div class="card-header">Manage Users</div>
                        <div class="card-body">
                            <table class="table table-bordered user_datatable display nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>No. Reg.</th>
                                        <th>Company</th>
                                        <th>Npwp</th>
                                        <th>Siup</th>
                                        <th>PIC</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('additional-js')
    <script type="text/javascript">
        $(function() {
            var table = $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('ship-registration-user.create') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'no_reg',
                        name: 'no_reg'
                    },
                    {
                        data: 'company',
                        name: 'company'
                    },
                    {
                        data: 'npwp',
                        name: 'npwp'
                    },
                    {
                        data: 'siup',
                        name: 'siup'
                    },
                    {
                        data: 'pic',
                        name: 'pic'
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
    </script>
@endsection
