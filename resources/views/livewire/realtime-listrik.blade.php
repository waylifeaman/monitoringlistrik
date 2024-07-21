<div wire:poll.1s>
    @if ($lastDataListrik)
        <table class="table mb-0">
            <tbody>
                <tr>
                    <td>Daya Terpakai</td>
                    <td class="text-end">{{ $lastDataListrik->daya_total }} <span class="card-title">Watt</td>
                </tr>
                <tr>
                    <td>Sisa Daya</td>
                    <td class="text-end">{{ $lastDataListrik->sisa_daya }} <span class="card-title">Watt</td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td><span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i>
                            {{ \Carbon\Carbon::parse($lastDataListrik->hari)->translatedFormat('l') }} </span>
                        <span class="text-danger">
                            {{ \Carbon\Carbon::parse($lastDataListrik->datetime)->format('H:i:s') }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No Data Found</p>
    @endif
</div>
