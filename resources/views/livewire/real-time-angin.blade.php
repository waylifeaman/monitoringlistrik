<div wire:poll.1s>
    @if ($lastdataangin)
        <div class="col-12 mx-2 mt-3 ">
            <h4 class="card-title">Realtime Data Kecepatan Angin</h4>
        </div>
        <div class="mb-0 mx-4">
            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i>
                {{ \Carbon\Carbon::parse($lastdataangin->hari)->translatedFormat('l') }} </span>

            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>
                {{ \Carbon\Carbon::parse($lastdataangin->datetime)->format('H:i:s') }}</span>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Kecepatan Angin</h5>
                    </div>
                    {{-- <div class="col-auto">
                        <div class="stat text-primary">
                            <i class="align-middle" data-feather="wind"></i>
                        </div>
                    </div> --}}
                </div>
                <h1 class="mt-1 mb-3 fw-bold " style="color: #232457;"">{{ $lastdataangin->kec_angin }} Kmh</h1>

            </div>
        </div>
    @else
        <p>No Data Found</p>
    @endif
</div>
