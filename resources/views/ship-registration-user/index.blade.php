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
                        Dashboard
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
                        <div class="card-body row">

                            {{-- Total --}}
                            <div class="text-center py-4 col-12 col-sm-6 col-lg-3">
                                {{-- Heading --}}
                                <div class="text-center mb-5">
                                    <i class="fa-solid fa-file"></i>
                                    <div class="display-5 fw-bold my-3" style="cursor: pointer;">{{$dataStats[0]->total}}</div>
                                    <div class="text-muted font-weight-medium text-uppercase">Total</div>
                                </div>


                                {{-- Button --}}
                                <div class="text-center">
                                    <div class="display mb-3 status-filter-btn" data-filter="all" style="cursor: pointer">Show</div>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-outline-success">
                                            <i class="fa-solid fa-file"></i>
                                        </button>
                                        <button class="btn btn-outline-danger">
                                            <i class="fa-solid fa-file"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- End: Total --}}

                            {{-- Request --}}
                            <div
                                class="text-center py-4 col-12 col-sm-6 col-lg-3 border border-bottom-0 border-top-0 border-2 border-black">
                                {{-- Heading --}}
                                <div class="text-center mb-5">
                                    <i class="fa-solid fa-file text-warning"></i>
                                    <div class="display-5 fw-bold my-3" style="cursor: pointer;">{{$dataStats[0]->status_0}}</div>
                                    <div class="text-muted font-weight-medium text-uppercase">Request</div>
                                </div>


                                {{-- Button --}}
                                <div class="text-center">
                                    <div class="display mb-3 status-filter-btn" data-filter="0" style="cursor: pointer">Show</div>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-outline-success">
                                            <i class="fa-solid fa-file"></i>
                                        </button>
                                        <button class="btn btn-outline-danger">
                                            <i class="fa-solid fa-file"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- End: Request --}}

                            {{-- Approved --}}
                            <div
                                class="text-center py-4 col-12 col-sm-6 col-lg-3 border border-bottom-0 border-top-0 border-2 border-black">
                                {{-- Heading --}}
                                <div class="text-center mb-5">
                                    <i class="fa-solid fa-file text-success"></i>
                                    <div class="display-5 fw-bold my-3" style="cursor: pointer;">{{$dataStats[0]->status_1}}</div>
                                    <div class="text-muted font-weight-medium text-uppercase">Approved</div>
                                </div>


                                {{-- Button --}}
                                <div class="text-center">
                                    <div class="display mb-3 status-filter-btn" data-filter="1" style="cursor: pointer">Show</div>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-outline-success">
                                            <i class="fa-solid fa-file"></i>
                                        </button>
                                        <button class="btn btn-outline-danger">
                                            <i class="fa-solid fa-file"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- End: Approved --}}

                            {{-- Waiting Approval --}}
                            <div class="text-center py-4 col-12 col-sm-6 col-lg-3">
                                {{-- Heading --}}
                                <div class="text-center mb-5">
                                    <i class="fa-solid fa-file text-danger"></i>
                                    <div class="display-5 fw-bold my-3" style="cursor: pointer;">{{$dataStats[0]->status_2}}</div>
                                    <div class="text-muted font-weight-medium text-uppercase">Waiting Approval</div>
                                </div>


                                {{-- Button --}}
                                <div class="text-center">
                                    <div class="display mb-3 status-filter-btn" data-filter="2" style="cursor: pointer">Show</div>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-outline-success">
                                            <i class="fa-solid fa-file"></i>
                                        </button>
                                        <button class="btn btn-outline-danger">
                                            <i class="fa-solid fa-file"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- End: Waiting Approval --}}



                        </div>
                    </div>
                </div>
                {{-- End: Dashboard Stats --}}


                {{-- Dashboard Stats --}}
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <table class="table table-bordered ship_registration display nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Association</th>
                                        <th>Registration Number</th>
                                        <th>Created</th>
                                        <th>Registration Status</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- End: Dashboard Stats --}}

            </div>
        </div>
    </div>
@endsection

@section('additional-js')
    <script type="text/javascript">
        var table;
        $(function() {
            table = $('.ship_registration').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('ship-registration-user.index') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'company',
                        name: 'company'
                    },
                    {
                        data: 'no_reg',
                        name: 'no_reg'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'status_admin',
                        name: 'status_admin'
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

        $('.status-filter-btn').click(function() {
            var filter = $(this).data('filter');
            console.log("FILTER", filter);


            // Reload the DataTable with the new filter value
            table.ajax.url("{{ route('ship-registration-user.index') }}?status_admin=" + filter).load();
        });
    </script>
@endsection
