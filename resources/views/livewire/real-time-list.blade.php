<div wire:poll.1s>
    @if ($lastdata)
        <div class="col-8 mx-2 mt-3 ">
            <h4 class="card-title">Realtime Data Indor</h4>
        </div>
        <div class="card">
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
                <h1 class="mt-1 mb-3 fw-bold text-warning">{{ $lastdata->suhu_ind }} &deg;C</h1>
                <div class="mb-0"> <span class="text-muted">Hari</span>
                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i>
                        {{ \Carbon\Carbon::parse($lastdata->hari)->translatedFormat('l') }} </span>
                    <span class="text-muted">Data Terkirim</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Kelembaban</h5>
                    </div>
                    {{-- <div class="col-auto">
                        <div class="stat text-primary">
                            <i class="align-middle" data-feather="droplet"></i>
                        </div>
                    </div> --}}
                </div>
                <h1 class="mt-1 mb-3 fw-bold text-primary">{{ $lastdata->kelembaban_ind }} %</h1>

                <div class="mb-0">
                    <span class="text-muted">Jam</span>
                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>
                        {{ \Carbon\Carbon::parse($lastdata->datetime)->format('H:i:s') }}</span>
                    <span class="text-muted">Data Terkirim</span>
                </div>
            </div>
        </div>
    @else
        <p>No Data Found</p>
    @endif
</div>
