<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\DataTables\CategoryDatatable;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin'); 
    }

    public function index(CategoryDatatable $category)
    {
        return $category->render('categories.index');
    }


    public function create()
    {
        $main_categories = Category::whereNull('parent_id')->get(['id', 'name']);
        return view('categories.create', compact('main_categories'));
    }


    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        if($data['parent_id'] == 0) {
            unset($data['parent_id']);
        }
        Category::create($data);
        return redirect()->route('category.index')->with('message','Category Created successfully');
    }


    public function edit(Category $category)
    {
        $main_categories = Category::whereNull('parent_id')->get(['id', 'name']);
        return view('categories.edit', compact('main_categories', 'category'));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        if($data['parent_id'] == 0) {
            unset($data['parent_id']);
        }
        $category->update($data);
        return redirect()->route('category.index')->with('message','Category Updated successfully');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('message','Category delete successfully');
    }
    
    public function sub_category(Request $request)
    {
        $sub_category = category::where('parent_id', $request->category_id)->get()->toArray();
        return response()->json($sub_category);
    }
}
