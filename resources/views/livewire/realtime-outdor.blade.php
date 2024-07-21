{{-- <div class="card-body" wire:poll.1s>
    @if ($lastDataOutdor)
        <div class="row">
            <h4 class="card-title">Realtime Data outdor </h4>
            <div class="col mt-0">
                <h6 class="card-title">Suhu</h6>
            </div>
            <div class="col mt-0">
                <h6 class="card-title">Kelembaban</h6>
            </div>
            <div class="col mt-0">
                <h6 class="card-title">Cahaya</h6>
            </div>
            <div class="col mt-0">
                <h6 class="card-title">Cuaca</h6>
            </div>
        </div>
        <div class="row ">
            <div class="col mt-0">
                <h4 class="mt-1 mb-3">{{ $lastDataOutdor->suhu_out }} &deg;C</h4>
            </div>
            <div class="col mt-0">
                <h4 class="mt-1 mb-3">{{ $lastDataOutdor->kelembaban_out }}%</h4>
            </div>
            <div class="col mt-0">
                @if ($lastDataOutdor->intens_cahaya > 80)
                    Cerah
                @elseif($lastDataOutdor->intens_cahaya > 40)
                    Berawan
                @elseif($lastDataOutdor->intens_cahaya > 20)
                    Gelap
                @endif
            </div>
            <div class="col mt-0">
                <h4 class="mt-1 mb-3">
                    @if ($lastDataOutdor->hujan == 0)
                        Hujan
                    @else
                        Cerah
                    @endif
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col mt-0">
                <span class="text-muted">{{ $lastDataOutdor->hari }}</span>
            </div>
            <div class="col mt-0">
                <span class="text-muted">{{ $lastDataOutdor->datetime }}</span>
            </div>
        </div>
    @else
        <p>No Data Found</p>
    @endif
</div> --}}



<div wire:poll.1s>
    @if ($lastDataOutdor)
        <div class="row">
            <div class="col-8 mx-2 ">
                <h4 class="card-title">Realtime Data Outdor</h4>
            </div>
        </div>
        <div class="row mx-2">
            <div class="col-4">
                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i>
                    {{ \Carbon\Carbon::parse($lastDataOutdor->hari)->translatedFormat('l') }} </span>
                <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>
                    {{ \Carbon\Carbon::parse($lastDataOutdor->datetime)->format('H:i:s') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Suhu</h5>
                            </div>
                            {{-- <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="thermometer"></i>
                                </div>
                            </div> --}}
                        </div>
                        <h3 class="mt-1 mb-3 fw-bold text-warning">{{ $lastDataOutdor->suhu_out }} &deg;C</h3>
                        {{-- <div class="mb-0">
                            <span class="text-muted">Jam</span>
                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>
                                {{ \Carbon\Carbon::parse($lastDataOutdor->datetime)->format('H:i:s') }}</span>
                            <span class="text-muted">Data Terkirim</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h6 class="card-title">Kalembaban</h6>
                            </div>
                            {{-- <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="droplet"></i>
                                </div>
                            </div> --}}
                        </div>
                        <h3 class="mt-1 mb-3 fw-bold text-primary">{{ $lastDataOutdor->kelembaban_out }} %</h3>
                        {{-- <div class="mb-0">
                            <span class="text-muted">Jam</span>
                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>
                                {{ \Carbon\Carbon::parse($lastDataOutdor->datetime)->format('H:i:s') }}</span>
                            <span class="text-muted">Data Terkirim</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Intensitas Cahaya</h5>
                            </div>

                            {{-- <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="sun"></i>
                                </div>
                            </div> --}}
                        </div>
                        <h3 class="mt-1 mb-3 fw-bold text-danger">
                            @if ($lastDataOutdor->intens_cahaya > 300)
                                Cerah
                            @elseif($lastDataOutdor->intens_cahaya > 250)
                                Sedikit Berawan
                            @elseif($lastDataOutdor->intens_cahaya > 200)
                                Berawan
                            @elseif($lastDataOutdor->intens_cahaya > 80)
                                mendung
                            @else
                                Gelap
                            @endif
                        </h3>
                        {{-- <div class="mb-0">
                            <span class="text-muted">Jam</span>
                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>
                                {{ \Carbon\Carbon::parse($lastDataOutdor->datetime)->format('H:i:s') }}</span>
                            <span class="text-muted">Data Terkirim</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Cuaca</h5>
                            </div>
                            {{-- <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="cloud-drizzle"></i>
                                </div>
                            </div> --}}
                        </div>
                        <h3 class="mt-1 mb-3 fw-bold text-success">
                            @if ($lastDataOutdor->hujan == 0)
                                Hujan
                            @else
                                Tidak Hujan
                            @endif
                        </h3>
                        {{-- <div class="mb-0">
                            <span class="text-muted">Jam</span>
                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>
                                {{ \Carbon\Carbon::parse($lastDataOutdor->datetime)->format('H:i:s') }}</span>
                            <span class="text-muted">Data Terkirim</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>No data</p>
    @endif
</div>
