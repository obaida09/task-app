<?php

namespace App\Http\Controllers;

use App\Models\PathologicalCase;
use App\Http\Requests\StorePathologicalCaseRequest;
use App\Http\Requests\UpdatePathologicalCaseRequest;

class PathologicalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePathologicalCaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePathologicalCaseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PathologicalCase  $pathologicalCase
     * @return \Illuminate\Http\Response
     */
    public function show(PathologicalCase $pathologicalCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PathologicalCase  $pathologicalCase
     * @return \Illuminate\Http\Response
     */
    public function edit(PathologicalCase $pathologicalCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePathologicalCaseRequest  $request
     * @param  \App\Models\PathologicalCase  $pathologicalCase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePathologicalCaseRequest $request, PathologicalCase $pathologicalCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PathologicalCase  $pathologicalCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(PathologicalCase $pathologicalCase)
    {
        //
    }
}
