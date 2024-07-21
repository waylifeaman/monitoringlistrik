<?php

namespace App\Http\Controllers;

use App\Models\dataindor;
use App\Http\Requests\StoredataindorRequest;
use App\Http\Requests\UpdatedataindorRequest;

class DataindorController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Data Indor";
        $id = 1;
        $data = dataindor::latest()->take(10100)->get();
        return view('dataindor', compact('data', 'id', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredataindorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredataindorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dataindor  $dataindor
     * @return \Illuminate\Http\Response
     */
    public function show(dataindor $dataindor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dataindor  $dataindor
     * @return \Illuminate\Http\Response
     */
    public function edit(dataindor $dataindor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedataindorRequest  $request
     * @param  \App\Models\dataindor  $dataindor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedataindorRequest $request, dataindor $dataindor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dataindor  $dataindor
     * @return \Illuminate\Http\Response
     */
    public function destroy(dataindor $dataindor)
    {
        //
    }
}
