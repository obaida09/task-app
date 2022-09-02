<?php

namespace App\Http\Controllers;

use App\Models\PathologicalCase;
use App\Models\Category;
use App\DataTables\PathologicalCaseDatatable;
use App\Http\Requests\StorePathologicalCaseRequest;
use App\Http\Requests\UpdatePathologicalCaseRequest;

class PathologicalCaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->except(['index']); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PathologicalCaseDatatable $cases)
    {
        return $cases->render('pathological_cases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::whereNull('parent_id')->get();
        return view('pathological_cases.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePathologicalCaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePathologicalCaseRequest $request)
    {
        PathologicalCase::create($request->validated());
        return redirect()->route('pathological_case.index');
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
        $category = Category::whereNull('parent_id')->get();
        return view('pathological_cases.edit', compact('category', 'pathologicalCase'));
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
        $pathologicalCase->update($request->validated());
        return redirect()->route('pathological_case.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PathologicalCase  $pathologicalCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(PathologicalCase $pathologicalCase)
    {
        $pathologicalCase->delete();
        return redirect()->route('pathological_case.index');
    }
}
