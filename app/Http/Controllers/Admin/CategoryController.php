<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\Store;
use App\Http\Requests\Categories\Update;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected QueryBuilder $categoriesQueryBuilder;
    protected QueryBuilder $newsQueryBuilder;

    public function __construct(
        CategoriesQueryBuilder $categoriesQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder
    ) {
        $this->categoriesQueryBuilder = $categoriesQueryBuilder;
        $this->newsQueryBuilder = $newsQueryBuilder;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder):View
    {
        return view('admin.categories.index', [
            'categoryList' => $categoriesQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  \view('admin.categories.create', [
            'news' => $this->newsQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request): RedirectResponse
    {
        $categories = Category::create($request->validated());
        if ($categories) {
                $categories->categories()->attach($request->getNews());

                return \redirect()->route('admin.categories.index')->with('success', __('Categories has been create'));
        }
        return \back()->with('error', __('Categories has not been create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category):View
    {
        return \view('admin.categories.edit', [
            'categories'=>$category,
            'news'=>$this ->newsQueryBuilder->getAll(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Category $category):RedirectResponse
    {
        $categories = $category->fill($request->validated());
        if ($categories->save()) {
            $categories->news()->sync($request->getNews());

            return \redirect()->route('admin.categories.index')->with('success', __('Categories has been updated'));
        }
        return \back()->with('error', __('Categories has not been updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
