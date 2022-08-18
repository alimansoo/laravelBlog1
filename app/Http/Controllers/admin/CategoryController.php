<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use function PHPUnit\Framework\isReadable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = [];
        if (\request('id')){
            $where[] = ['id','=',\request('id')];
        }
        if (\request('name')){
            $where[] = ['name_fa','Like','%'.\request('name').'%'];
        }
        if (\request('slug')){
            $where[] = ['slug','Like','%'.\request('slug').'%'];
        }

        if (count($where) > 0)
            $categories = Category::where($where)->orderBy('id', 'desc')->paginate(10)->withQueryString();
        else
            $categories = Category::orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view(
            'admin.categories',
            [
                'categories'=>$categories,
                'sidebar'=>'categories'
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin/createCategory',
            [
                'sidebar'=>'categories'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create(
            [
                'name_fa'=>$request->name_fa,
            ]
        );
        return redirect('admin/categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view(
            'admin/updateCategory',
            [
                'category'=>$category,
                'sidebar'=>'categories'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update(
            [
                'name_fa'=>$request->name_fa,
                'slug'=>$request->slug,
            ]
        );
        return redirect('admin/categories');
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
        return back();
    }
}
