@extends('layouts.main')

@section('content')
    {{-- <h1 class="h3 mb-3 ">Beranda Kantorku</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Selamat Datang {{ auth()->user()->name }}</h5>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
        <div class="row">

            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card flex-fill w-100">
                    <div class="col-8 mt-3 mx-2 ">
                        <h4 class="card-title">Realtime Data Listrik</h4>
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="py-3">
                        <div class="chart chart-xs">
                            <canvas id="pielistrik"></canvas>
                        </div>
                    </div>
                    @livewire('realtime-listrik')
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Grafik Penggunaan Daya Listrik</h5>
                    </div>
                    <div class="card-body text-center">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item card-title" role="presentation">
                                <button class="nav-link active" id="pills-hour-tab-listrik" data-bs-toggle="pill"
                                    data-bs-target="#pills-hour-listrik" type="button" role="tab"
                                    aria-controls="pills-hour-listrik" aria-selected="true">Data 1 jam </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-day-tab-listrik" data-bs-toggle="pill"
                                    data-bs-target="#pills-day-listrik" type="button" role="tab"
                                    aria-controls="pills-day-listrik" aria-selected="false">Data 1 Hari</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-moun-tab-listrik" data-bs-toggle="pill"
                                    data-bs-target="#pills-moun-listrik" type="button" role="tab"
                                    aria-controls="pills-moun-listrik" aria-selected="false">Data 1 Bulan</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-hour-listrik" role="tabpanel"
                                aria-labelledby="pills-hour-tab-listrik">
                                <canvas id="listrikChart-lasthour" style="width: 100%; height:250px"></canvas>
                                <!-- Content for the "Last 10" tab goes here -->
                            </div>

                            <div class="tab-pane fade" id="pills-day-listrik" role="tabpanel"
                                aria-labelledby="pills-day-tab-listrik">
                                <canvas id="listrikChart-lastday" style="width: 100%; height:250px"></canvas>
                                <!-- Content for the "Last 1 hour" tab goes here -->
                            </div>

                            <div class="tab-pane fade" id="pills-moun-listrik" role="tabpanel"
                                aria-labelledby="pills-moun-tab-listrik">
                                <canvas id="listrikChart-lastmoun" style="width: 100%; height:250px"></canvas>
                                <!-- Content for the "Last 1 month" tab goes here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @livewire('real-time-list')
                            </div>
                            <div class="card">
                                @livewire('realtime-outdor')
                            </div>
                        </div>

                    </div>
                </div>
            </div> --}}

            <div class="col-xl-8 col-xxl-7">
                <div class="card flex-fill w-100">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <h5 class="card-title mb-4">Grafik Data Indor</h5>
                            </div>
                        </div>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link  card-title active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Data 1 Jam </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Data 1 Hari</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Data 1 Bulan</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <canvas id="indorChart-lasthour"></canvas>

                                <!-- Content for the "Last 10" tab goes here -->
                            </div>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <canvas id="indorChart-lastday"></canvas>
                            </div>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <canvas id="indorChart-lastmoun"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card flex-fill">
                    @livewire('real-time-list')
                </div>
            </div>
        </div>




        <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h5 class="card-title mb-0">Grafik Data Outdor</h5>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item card-title" role="presentation">
                                <button class="nav-link active" id="pills-hour-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-hour" type="button" role="tab"
                                    aria-controls="pills-hour" aria-selected="true">Data 1 Jam</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-day-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-day" type="button" role="tab" aria-controls="pills-day"
                                    aria-selected="false">Data 1 Hari</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-moun-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-moun" type="button" role="tab"
                                    aria-controls="pills-moun" aria-selected="false">Data 1 Bulan</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-hour" role="tabpanel"
                                aria-labelledby="pills-hour-tab">
                                <canvas id="outChart-lasthour"></canvas>
                                <!-- Content for the "Last 10" tab goes here -->
                            </div>

                            <div class="tab-pane fade" id="pills-day" role="tabpanel" aria-labelledby="pills-day-tab">
                                <canvas id="outChart-lastday" width="400" height="200"></canvas>
                                <!-- Content for the "Last 1 hour" tab goes here -->
                            </div>

                            <div class="tab-pane fade" id="pills-moun" role="tabpanel" aria-labelledby="pills-moun-tab">
                                <canvas id="outChart-lastmoun" width="400" height="200"></canvas>
                                <!-- Content for the "Last 1 month" tab goes here -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        @livewire('realtime-outdor')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-xxl-7">
                <div class="card flex-fill w-100">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <h5 class="card-title mb-4">Grafik Data Angin</h5>
                            </div>
                        </div>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link  card-title active" id="pills-home-tab-angin-lasthour"
                                    data-bs-toggle="pill" data-bs-target="#pills-home-angin-lasthour" type="button"
                                    role="tab" aria-controls="pills-home-angin-lasthour" aria-selected="true">Data 1
                                    Jam
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-profile-tab-angin-lastday"
                                    data-bs-toggle="pill" data-bs-target="#pills-profile-angin-lastday" type="button"
                                    role="tab" aria-controls="pills-profile-angin-lastday" aria-selected="false">Data
                                    1 Hari</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-contact-tab-angin-lastmoun"
                                    data-bs-toggle="pill" data-bs-target="#pills-contact-angin-lastmoun" type="button"
                                    role="tab" aria-controls="pills-contact-angin-lastmoun"
                                    aria-selected="false">Data 1 Bulan</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home-angin-lasthour" role="tabpanel"
                                aria-labelledby="pills-home-tab-angin-lasthour">
                                <canvas id="anginChart-lasthour"></canvas>

                                <!-- Content for the "Last 10" tab goes here -->
                            </div>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-profile-angin-lastday" role="tabpanel"
                                aria-labelledby="pills-profile-tab-angin-lastday">
                                <canvas id="anginChart-lastday"></canvas>
                            </div>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-contact-angin-lastmoun" role="tabpanel"
                                aria-labelledby="pills-contact-tab-angin-lastmoun">
                                <canvas id="anginChart-lastmoun"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card flex-fill">
                    @livewire('realtime-angin')
                </div>
            </div>
        </div>




        {{-- <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Grafik Kecepatan Angin</h5>
                    </div>
                    <div class="card-body text-center">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item card-title" role="presentation">
                                <button class="nav-link active" id="pills-hour-tab-angin" data-bs-toggle="pill"
                                    data-bs-target="#pills-hour-angin" type="button" role="tab"
                                    aria-controls="pills-hour-angin" aria-selected="true">Data 1 jam </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-day-tab-angin" data-bs-toggle="pill"
                                    data-bs-target="#pills-day-angin" type="button" role="tab"
                                    aria-controls="pills-day-angin" aria-selected="false">Data 1 Hari</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link card-title" id="pills-moun-tab-angin" data-bs-toggle="pill"
                                    data-bs-target="#pills-moun-angin" type="button" role="tab"
                                    aria-controls="pills-moun-angin" aria-selected="false">Data 1 Bulan</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-hour-angin" role="tabpanel"
                                aria-labelledby="pills-hour-tab-angin">
                                <canvas id="anginChart-lasthour" style="width: 100%; height:250px"></canvas>
                            </div>

                            <div class="tab-pane fade" id="pills-day-angin" role="tabpanel"
                                aria-labelledby="pills-day-tab-angin">
                                <canvas id="anginChart-lastday" style="width: 100%; height:250px"></canvas>
                            </div>

                            <div class="tab-pane fade" id="pills-moun-angin" role="tabpanel"
                                aria-labelledby="pills-moun-tab-angin">
                                <canvas id="anginChart-lastmoun" style="width: 100%; height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-lg-4 col-xxl-3 d-flex">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Orders</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">64</h1>
                        <div class="mb-0">
                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endsection
