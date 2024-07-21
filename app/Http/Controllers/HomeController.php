<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Indor;
use App\Models\dataangin;
use App\Models\dataindor;
use App\Models\dataoutdor;
use App\Models\datalistrik;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data['suhu_ind'] = dataindor::suhuIndor();
        $lastdata = dataoutdor::latest()->first();
        return view('home', ['title' => "Dashboard", 'lastdata' => $lastdata])->with('success', 'Data berhasil disimpan!');
    }
    public function indorlastday()
    {
        $dataind = dataindor::latest()->take(1440)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        // $dataout = dataoutdor::latest()->take(10)->get([
        //     'datetime', 'suhu_out', 'kelembaban_out', 'hujan',
        //     'kond_cahaya', 'intens_cahaya', 'hari',
        // ]);
        return response()->json($dataind,);
    }
    public function indorlasthour()
    {
        $dataind = dataindor::latest()->take(60)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        // $dataout = dataoutdor::latest()->take(10)->get([
        //     'datetime', 'suhu_out', 'kelembaban_out', 'hujan',
        //     'kond_cahaya', 'intens_cahaya', 'hari',
        // ]);
        return response()->json($dataind,);
    }
    public function indorlastmoun()
    {
        $dataind = dataindor::latest()->take(43200)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        // $dataout = dataoutdor::latest()->take(10)->get([
        //     'datetime', 'suhu_out', 'kelembaban_out', 'hujan',
        //     'kond_cahaya', 'intens_cahaya', 'hari',
        // ]);
        return response()->json($dataind,);
    }
    public function fetchDataPie()
    {
        $latestData = dataindor::latest()->first();

        return response()->json(
            $latestData
        );
    }

    public function fetchDataOutdorlasthour()
    {
        // $dataind = Indor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        $dataout = dataoutdor::latest()->take(60)->get([
            'datetime', 'suhu_out', 'kelembaban_out', 'hujan',
            'kond_cahaya', 'intens_cahaya', 'hari',
        ]);
        return response()->json($dataout,);
    }
    public function fetchDataOutdorlastday()
    {
        // $dataind = Indor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        $dataout = dataoutdor::latest()->take(1440)->get([
            'datetime', 'suhu_out', 'kelembaban_out', 'hujan',
            'kond_cahaya', 'intens_cahaya', 'hari',
        ]);
        return response()->json($dataout,);
    }
    public function fetchDataOutdorlastmoun()
    {
        // $dataind = Indor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        $dataout = dataoutdor::latest()->take(43200)->get([
            'datetime', 'suhu_out', 'kelembaban_out', 'hujan',
            'kond_cahaya', 'intens_cahaya', 'hari',
        ]);
        return response()->json($dataout,);
    }
    public function fetchDataListriklasthour()
    {
        // $dataind = Indor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        $datalistrik = datalistrik::latest()->take(60)->get([
            'daya_total', 'sisa_daya', 'datetime'
        ]);
        return response()->json($datalistrik,);
    }
    public function fetchDataListriklastday()
    {
        // $dataind = Indor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        $datalistrik = datalistrik::latest()->take(1440)->get([
            'daya_total', 'sisa_daya', 'datetime'
        ]);
        return response()->json($datalistrik,);
    }
    public function fetchDataListriklastmoun()
    {
        // $dataind = Indor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        $datalistrik = datalistrik::latest()->take(43200)->get([
            'daya_total', 'sisa_daya', 'datetime'
        ]);
        return response()->json($datalistrik,);
    }

    public function fetchDataPielistrik()
    {
        $latestData = datalistrik::latest()->first();

        return response()->json(
            $latestData
        );
    }

    public function fetchDataanginlasthour()
    {
        // $dataind = Indor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        $dataangin = dataangin::latest()->take(60)->get([
            'kec_angin', 'datetime'
        ]);
        return response()->json($dataangin,);
    }
    public function fetchDataanginlastday()
    {
        // $dataind = Indor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        $dataangin = dataangin::latest()->take(1440)->get([
            'kec_angin', 'datetime'
        ]);
        return response()->json($dataangin,);
    }
    public function fetchDataanginlastmoun()
    {
        // $dataind = Indor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind', 'hari']);
        $dataangin = dataangin::latest()->take(43200)->get([
            'kec_angin', 'datetime'
        ]);
        return response()->json($dataangin,);
    }
}
