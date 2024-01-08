@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="data-konten">
            <h1>Data Sensor Angin</h1>
            <div class="card">
                <div class="head mx-4 mt-4 mb-0">
                    <p>Pilih Export</p>
                </div>
                <div class="card-body">
                    <div class="tabel">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kec Angi</th>
                                    <th>Day</th>
                                    <th>Datetime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $dt->kec_angin }}</td>
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
