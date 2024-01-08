@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="data-konten">
            <h1>Data Sensor Tegangan</h1>
            <div class="card">
                <div class="head mx-4 mt-4 mb-0">
                    <p>Pilih Export</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">id</th>
                                    <th style="width: 10%">Tegangan 1</th>
                                    <th style="width: 10%">Arus 1</th>
                                    <th style="width: 10%">Daya 1</th>
                                    <th style="width: 10%">Tegangan 2</th>
                                    <th style="width: 10%">Arus 2</th>
                                    <th style="width: 10%">Daya 2</th>
                                    <th style="width: 10%">Tegangan 3</th>
                                    <th style="width: 10%">Arus 3</th>
                                    <th style="width: 10%">Daya 3</th>
                                    <th style="width: 10%">Total Daya</th>
                                    <th style="width: 10%">Sisa Daya</th>
                                    <th style="width: 10%">Day</th>
                                    <th style="width: 15%">Datetime</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $dt->tegangan_1 }}</td>
                                        <td>{{ $dt->arus_1 }}</td>
                                        <td>{{ $dt->daya_1 }}</td>
                                        <td>{{ $dt->tegangan_2 }}</td>
                                        <td>{{ $dt->arus_2 }}</td>
                                        <td>{{ $dt->daya_2 }}</td>
                                        <td>{{ $dt->tegangan_3 }}</td>
                                        <td>{{ $dt->arus_3 }}</td>
                                        <td>{{ $dt->daya_3 }}</td>
                                        <td>{{ $dt->daya_total }}</td>
                                        <td>{{ $dt->sisa_daya }}</td>
                                        <td>{{ \Carbon\Carbon::parse($dt->hari)->translatedFormat('l') }}</td>
                                        <td>{{ $dt->datetime }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
