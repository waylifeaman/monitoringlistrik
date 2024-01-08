<?php

namespace App\Http\Controllers;

use App\Models\datalistrik;
use App\Http\Requests\StoredatalistrikRequest;
use App\Http\Requests\UpdatedatalistrikRequest;

class DatalistrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Data Listrik";
        $id = 1;
        $data = Datalistrik::latest()->take(1450)->get();
        return view('datalistrik', compact('data', 'id', 'title'));
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
     * @param  \App\Http\Requests\StoredatalistrikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredatalistrikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datalistrik  $datalistrik
     * @return \Illuminate\Http\Response
     */
    public function show(datalistrik $datalistrik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datalistrik  $datalistrik
     * @return \Illuminate\Http\Response
     */
    public function edit(datalistrik $datalistrik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedatalistrikRequest  $request
     * @param  \App\Models\datalistrik  $datalistrik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedatalistrikRequest $request, datalistrik $datalistrik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datalistrik  $datalistrik
     * @return \Illuminate\Http\Response
     */
    public function destroy(datalistrik $datalistrik)
    {
        //
    }
}
