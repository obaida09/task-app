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
        $this->middleware('isAdmin')->except(['index', 'show']); 
    }

    public function index(PathologicalCaseDatatable $cases)
    {
        return $cases->render('pathological_cases.index');
    }


    public function create()
    {
        $category = Category::whereNull('parent_id')->get();
        return view('pathological_cases.create', compact('category'));
    }


    public function store(StorePathologicalCaseRequest $request)
    {
        PathologicalCase::create($request->validated());
        return redirect()->route('pathological_case.index')->with('message','Pathological Case created successfully');
    }


    public function show(PathologicalCase $pathologicalCase)
    {
        return view('pathological_cases.show', compact('pathologicalCase'));
    }


    public function edit(PathologicalCase $pathologicalCase)
    {
        $pathologicalCase = $pathologicalCase->with('category')->first();
        $category = Category::whereNull('parent_id')->get();
        return view('pathological_cases.edit', compact('category', 'pathologicalCase'))->with('message','Pathological Case updated successfully');
    }


    public function update(UpdatePathologicalCaseRequest $request, PathologicalCase $pathologicalCase)
    {
        $pathologicalCase->update($request->validated());
        return redirect()->route('pathological_case.index');
    }


    public function destroy(PathologicalCase $pathologicalCase)
    {
        $pathologicalCase->delete();
        return redirect()->route('pathological_case.index')->with('message','Pathological Case deleted successfully');
    }
}
