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
        //
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
            'parent_category' => $data['parent_category'] ?? 0,
        ]);

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
    }

    public function changeStatus(Category $category)
    {
        if ($category->isActivate()) {
            $category->update([
                'status' => config('constants.status.inactive'),
            ]);

            // session()->flash('success', 'تم إلغاء التفعيل بنجاح');

            return redirect()->route('categories.index');
        }

        if (! $category->isActivate()) {
            $category->update([
                'status' => config('constants.status.active'),
            ]);
            // session()->flash('success', 'تم التفعيل بنجاح');

            return redirect()->route('categories.index');
        }
    }

}
