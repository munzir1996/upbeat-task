<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::all();

        return view('admin.categories.create', [
            'parentCategories' => $parentCategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->validated();

        Category::create([
             'name' => $data['name'],
             'description' => $data['description'] ?? null,
             'parent_category' => $data['parent_category'] ?? 0,
        ]);


        session()->flash('success', 'Category Added');

        return redirect()->route('categories.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parentCategories = Category::all();

        return view('admin.categories.edit', [
            'category' => $category,
            'parentCategories' => $parentCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
        ]);

        session()->flash('success', 'Category Edited');

        return redirect()->route('categories.edit', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Category Deleted');

        return redirect()->route('categories.index');
    }

    public function changeStatus(Category $category)
    {
        if ($category->isActivate()) {
            $category->update([
                'status' => config('constants.status.inactive'),
            ]);

            session()->flash('success', 'Store Status Updated');
            return redirect()->route('categories.index');
        }

        if (! $category->isActivate()) {
            $category->update([
                'status' => config('constants.status.active'),
            ]);

            session()->flash('success', 'Store Status Updated');
            return redirect()->route('categories.index');
        }
    }

}
