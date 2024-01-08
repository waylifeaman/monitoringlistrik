@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="data-konten">
            <h1>Data Sensor Outdor</h1>
            <div class="card">
                <div class="head mx-4 mt-4 mb-0">
                    <p>Pilih Export</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 10%">Suhu Out</th>
                                    <th style="width: 10%">Kelembaban Out</th>
                                    <th style="width: 10%">Hujan</th>
                                    <th style="width: 10%">Kondisi Cahaya</th>
                                    <th style="width: 10%">Intensitas Cahaya</th>
                                    <th style="width: 10%">Day</th>
                                    <th style="width: 25%">Datetime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $dt->suhu_out }}</td>
                                        <td>{{ $dt->kelembaban_out }}</td>
                                        <td>
                                            @if ($dt->hujan == 0)
                                                Rain
                                            @else
                                                Not Rain
                                            @endif
                                        </td>
                                        <td>
                                            @if ($dt->kond_cahaya == 0)
                                                Bright
                                            @else
                                                Dark
                                            @endif
                                        </td>
                                        <td>{{ $dt->intens_cahaya }}</td>
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
