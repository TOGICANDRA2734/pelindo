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
                        Edit Data
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <form action="{{ route('ship-registration-user.update', $id) }}" method="POST" class="row row-deck row-cards" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            {{-- Company --}}
                            <div class="mb-3 row">
                                <label class="form-label">Select Company</label>
                                <select class="form-select" name="company">
                                    <option value="1" {{$data->company == 1 ? 'selected' : ''}}>Company A</option>
                                    <option value="2" {{$data->company == 2 ? 'selected' : ''}}>Company B</option>
                                    <option value="3" {{$data->company == 3 ? 'selected' : ''}}>Company C</option>
                                </select>
                            </div>

                            {{-- NPWP --}}
                            <div class="mb-3 row">
                                <label class="form-label">NPWP</label>
                                <input type="text" class="form-control" name="npwp" placeholder="Input npwp" value="{{$data->npwp}}">
                            </div>

                            {{-- no_pmku --}}
                            <div class="mb-3 row">
                                <label class="form-label">No. PMKU</label>
                                <input type="text" class="form-control" name="no_pmku" placeholder="Input No. PMKU" value="{{$data->no_pmku}}">
                            </div>

                            {{-- siup --}}
                            <div class="mb-3 row">
                                <label class="form-label">S.I.U.P.</label>
                                <input type="text" class="form-control" name="siup" placeholder="Input S.I.U.P." value="{{$data->siup}}">
                            </div>

                            {{-- pic --}}
                            <div class="mb-3 row">
                                <label class="form-label">PIC</label>
                                <input type="text" class="form-control" name="pic" placeholder="Input PIC" value="{{$data->pic}}">
                            </div>

                            {{-- pic_email --}}
                            <div class="mb-3 row">
                                <label class="form-label">PIC Email</label>
                                <input type="email" class="form-control" name="pic_email" placeholder="Input PIC Email" value="{{$data->pic_email}}">
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
                                    <input type="text" class="form-control" name="name_ship" placeholder="Input Name Of Ship" value="{{$data->name_ship}}">
                                </div>

                                {{-- Of Ship --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Of Ship</label>
                                    <input type="text" class="form-control" name="of_ship" placeholder="Input Of Ship" value="{{$data->of_ship}}">
                                </div>

                                {{-- Last Docking --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Last Docking</label>
                                    <input type="date" class="form-control" name="last_docking" placeholder="Input Last Docking" value="{{$data->last_docking}}">
                                </div>

                                {{-- Trade Area --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Trade Area</label>
                                    <input type="text" class="form-control" name="trade_area" placeholder="Input Trade Area" value="{{$data->trade_area}}">
                                </div>
                            </div>

                            <div class="col-12 row">
                                {{-- Distinctive Number Of Letter --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Distinctive Number Of Letter</label>
                                    <input type="text" class="form-control" name="dnol" placeholder="Input Distinctive Number Of Letter" value="{{$data->dnol}}">
                                </div>

                                {{-- Gross Tonage --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Gross Tonage</label>
                                    <input type="text" class="form-control" name="gross_tonage" placeholder="Input Gross Tonage" value="{{$data->gross_tonage}}">
                                </div>

                                {{-- Classification --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Classification</label>
                                    <input type="text" class="form-control" name="classification" placeholder="Input Classification" value="{{$data->classification}}">
                                </div>

                                {{-- company --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">company</label>
                                    <input type="text" class="form-control" name="company_ship" placeholder="Input company" value="{{$data->company_ship}}">
                                </div>
                            </div>

                            <div class="col-12 row">
                                {{-- Registry --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Registry</label>
                                    <input type="text" class="form-control" name="registry" placeholder="Input Registry" value="{{$data->registry}}">
                                </div>

                                {{-- Keel Laid --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Keel Laid</label>
                                    <input type="text" class="form-control" name="keel_laid" placeholder="Input Keel Laid" value="{{$data->keel_laid}}">
                                </div>

                                {{-- Galangan --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Galangan</label>
                                    <input type="text" class="form-control" name="galangan" placeholder="Input Galangan" value="{{$data->galangan}}">
                                </div>

                                {{-- dokumen kapal --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Dokumen Kapal {!! $data->dokumen_kapal ? '<a style="ml-1" href="' . asset("dokumen_kapal/" . $data->dokumen_kapal) . '">Cek File</a>' : '' !!}</label>
                                    <input type="file" class="form-control" name="dokumen_kapal" placeholder="Input dokumen kapal">
                                </div>

                            </div>

                            <div class="col-12 row">

                                {{-- Effective Power --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Effective Power</label>
                                    <input type="text" class="form-control" name="effective_power" placeholder="Input Effective Power" value="{{$data->effective_power}}">
                                </div>

                                {{-- Cert Expired --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Cert Expired</label>
                                    <input type="date" class="form-control" name="cert_expired" placeholder="Input Cert Expired" value="{{$data->cert_expired}}">
                                </div>


                                {{-- Owner Address --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Owner Address</label>
                                    <input type="text" class="form-control" name="owner_address" placeholder="Input Owner Address" value="{{$data->owner_address}}">
                                </div>
                            </div>

                            <div class="col-12 row">
                                {{-- Engine No. --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Engine No.</label>
                                    <input type="text" class="form-control" name="engine_no" placeholder="Input Engine No." value="{{$data->engine_no}}">
                                </div>


                                {{-- Class Expired --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Class Expired</label>
                                    <input type="date" class="form-control" name="class_expired" placeholder="Input Class Expired" value="{{$data->class_expired}}">
                                </div>

                                {{-- Main Engine --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Main Engine</label>
                                    <input type="text" class="form-control" name="main_engine" placeholder="Input Main Engine" value="{{$data->main_engine}}">
                                </div>
                            </div>

                            <div class="col-12 row">
                                {{-- Machine Number --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Machine Number</label>
                                    <input type="text" class="form-control" name="machine_number" placeholder="Input Machine Number" value="{{$data->machine_number}}">
                                </div>

                                {{-- hull --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Hull</label>
                                    <input type="text" class="form-control" name="hull" placeholder="Input Hull" value="{{$data->hull}}">
                                </div>

                                {{-- Ship Type --}}
                                <div class="mb-3 col-12 col-sm-3">
                                    <label class="form-label">Ship Type</label>
                                    <input type="text" class="form-control" name="ship_type" placeholder="Input Ship Type" value="{{$data->ship_type}}">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-ghost-primary active w-100">Update</button>
                </div>


                {{-- <div class="container">
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
                </div> --}}
            </form>
        </div>
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
