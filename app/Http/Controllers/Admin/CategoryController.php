<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string']
        ]);

        $news = $request->input('news');

        $categories =$request->only(['title', 'description']);
        $categories = Category::create($categories);
        if ($categories !== false) {
            if($news !== null) {
                $categories->news()->attach($news);
                return \redirect()->route('admin.categories.index')->with('success', 'Categories has been created');
            }
        }
        return \back()->with('error', 'Categories has not been created');
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
    public function update(Request $request, Category $category):RedirectResponse
    {
        $news = $request->input('news');

        $categories = $category->fill($request->only(['title', 'description']));
        if ($categories->save()) {
            $categories->news()->sync($news);

            return \redirect()->route('admin.categories.index')->with('success', 'Categories has been update');
        }
        return \back()->with('error', 'Categories has not been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
