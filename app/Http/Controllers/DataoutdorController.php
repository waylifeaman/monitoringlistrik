<?php

namespace App\Http\Controllers;

use App\Models\dataoutdor;
use App\Http\Requests\StoredataoutdorRequest;
use App\Http\Requests\UpdatedataoutdorRequest;

class DataoutdorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Data Outdor";
        $id = 1;
        $data = Dataoutdor::latest()->take(1450)->get();
        return view('dataoutdor', compact('data', 'id', 'title'));
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
     * @param  \App\Http\Requests\StoredataoutdorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredataoutdorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dataoutdor  $dataoutdor
     * @return \Illuminate\Http\Response
     */
    public function show(dataoutdor $dataoutdor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dataoutdor  $dataoutdor
     * @return \Illuminate\Http\Response
     */
    public function edit(dataoutdor $dataoutdor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedataoutdorRequest  $request
     * @param  \App\Models\dataoutdor  $dataoutdor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedataoutdorRequest $request, dataoutdor $dataoutdor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dataoutdor  $dataoutdor
     * @return \Illuminate\Http\Response
     */
    public function destroy(dataoutdor $dataoutdor)
    {
        //
    }
}
