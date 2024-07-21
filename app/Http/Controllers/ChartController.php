<?php
// app/Http/Controllers/ChartController.php

namespace App\Http\Controllers;

use App\Models\Indor;
use App\Models\dataindor;
use Illuminate\Http\Request;

class ChartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('index');
    }

    public function fetchData()
    {
        $data = dataindor::latest()->take(10)->get(['datetime', 'suhu_ind', 'kelembaban_ind']);

        return response()->json($data);
    }
}
