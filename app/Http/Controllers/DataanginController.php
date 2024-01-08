<?php

namespace App\Http\Controllers;

use App\Models\dataangin;
use App\Http\Requests\StoredataanginRequest;
use App\Http\Requests\UpdatedataanginRequest;

class DataanginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Data Angin";
        $id = 1;
        $data = Dataangin::latest()->take(1450)->get();
        return view('dataangin', compact('data', 'id', 'title'));
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
     * @param  \App\Http\Requests\StoredataanginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredataanginRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dataangin  $dataangin
     * @return \Illuminate\Http\Response
     */
    public function show(dataangin $dataangin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dataangin  $dataangin
     * @return \Illuminate\Http\Response
     */
    public function edit(dataangin $dataangin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedataanginRequest  $request
     * @param  \App\Models\dataangin  $dataangin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedataanginRequest $request, dataangin $dataangin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dataangin  $dataangin
     * @return \Illuminate\Http\Response
     */
    public function destroy(dataangin $dataangin)
    {
        //
    }
}
