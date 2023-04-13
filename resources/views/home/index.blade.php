@extends('layouts.home')

@section('title', env('APP_NAME') . ' - HOME')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" method="POST" class="row">
                                @csrf

                                <div class="col-sm-12 col-lg-2 mb-2 mb-lg-0">
                                    <div class="form-label">Filter Type</div>
                                    <select class="form-select">
                                        <option value="1">Date</option>
                                        <option value="2">Month</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-lg-2 mb-2 mb-lg-0">
                                    <label class="form-label">From</label>
                                    <div class="input-icon">
                                        <input class="form-control " placeholder="Select a date" id="datepicker-icon-from"
                                            value="2020-06-20" />
                                        <span class="input-icon-addon">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                <path d="M16 3l0 4" />
                                                <path d="M8 3l0 4" />
                                                <path d="M4 11l16 0" />
                                                <path d="M11 15l1 0" />
                                                <path d="M12 15l0 3" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-2 mb-2 mb-lg-0">
                                    <label class="form-label">To</label>
                                    <div class="input-icon">
                                        <input class="form-control " placeholder="Select a date" id="datepicker-icon-to"
                                            value="2020-06-20" />
                                        <span class="input-icon-addon">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                <path d="M16 3l0 4" />
                                                <path d="M8 3l0 4" />
                                                <path d="M4 11l16 0" />
                                                <path d="M11 15l1 0" />
                                                <path d="M12 15l0 3" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-1 d-flex justify-content-center align-items-end">
                                    <button class="btn btn-primary w-100 w-lg-100 h-auto">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>

                                <div class="col-sm-12 col-lg-1"></div>


                                <div class="col-sm-12 col-lg-2 mb-2 mb-lg-0">
                                    <div class="form-label">Dashboard Type</div>
                                    <select class="form-select">
                                        <option value="1">Single TWL</option>
                                        <option value="2">TWL</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-lg-2 mb-2 mb-lg-0">
                                    <div class="form-label">Status</div>
                                    <select class="form-select">
                                        <option value="1">Request</option>
                                        <option value="2">Approval</option>
                                        <option value="3">Activate</option>
                                    </select>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

                {{-- Chart --}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-sm-12 col-lg-6">
                                <h3 class="card-title text-center">Total New Registration Ship Registration</h3>
                                <div id="chart-combination" class="chart-lg rounded shadow-sm bg-light"></div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <h3 class="card-title text-center">Total Waiting List Ship Registration</h3>
                                <div id="chart-combination-2" class="chart-lg rounded shadow-sm bg-light"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional-js')

    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-combination'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: '100%',
                    width: '100%',
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Request",
                    data: [30, 20, 50, 40, 60, 50]
                }, {
                    name: "Approval",
                    data: [200, 130, 90, 240, 130, 220]
                }, {
                    name: "Waiting Approval",
                    data: [300, 200, 160, 400, 250, 250]
                }],
                tooltip: {
                    theme: 'dark'
                },
                grid: {
                    padding: {
                        left: 40,
                        right: 20,
                        top: 30,
                        bottom: 40,
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 10,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    categories: ['2013', '2014', '2015', '2016', '2017', '2018'],
                    title: {
                        text: 'Request Date',
                        offsetY: 90, // move the title below the categories by 20 pixels
                    }
                },
                yaxis: {
                    labels: {
                        padding: 45,
                    },
                    title: {
                        text: 'Request(Qty)',
                        offsetX: 0, // move the title to the left by 20 pixels
                    }
                },
                colors: [tabler.getColor("gray"), tabler.getColor("green"), tabler.getColor("primary")],
                legend: {
                    position: 'top', // place the legend at the top
                    markers: {
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        radius: 12,
                        onClick: undefined,
                    },
                },
                responsive: [{
                    breakpoint: 767,
                    options: {
                        chart: {
                            height: 420
                        },
                        legend: {
                            position: 'bottom',
                        },
                    },
                }]
            })).render();
        });
        // @formatter:on

        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-combination-2'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: '100%',
                    width: '100%',
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Request",
                    data: [30, 20, 50, 40, 60, 50]
                }, {
                    name: "Approval",
                    data: [200, 130, 90, 240, 130, 220]
                }, {
                    name: "Waiting Approval",
                    data: [300, 200, 160, 400, 250, 250]
                }],
                tooltip: {
                    theme: 'dark'
                },
                grid: {
                    padding: {
                        left: 40,
                        right: 20,
                        top: 30,
                        bottom: 40,
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 10,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    categories: ['2013', '2014', '2015', '2016', '2017', '2018'],
                    title: {
                        text: 'Request Date',
                        offsetY: 90, // move the title below the categories by 20 pixels
                    }
                },
                yaxis: {
                    labels: {
                        padding: 45,
                    },
                    title: {
                        text: 'Request(Qty)',
                        offsetX: 0, // move the title to the left by 20 pixels
                    }
                },
                colors: [tabler.getColor("gray"), tabler.getColor("green"), tabler.getColor("primary")],
                legend: {
                    position: 'top', // place the legend at the top
                    markers: {
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        radius: 12,
                        onClick: undefined,
                    },
                },
                responsive: [{
                    breakpoint: 767,
                    options: {
                        chart: {
                            height: 420
                        },
                        legend: {
                            position: 'bottom',
                        },
                    },
                }]
            })).render();
        });
    </script>
@endsection
