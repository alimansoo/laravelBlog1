<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
        if (\request('title')){
            $where[] = ['title','Like','%'.\request('title').'%'];
        }
        if (\request('writer')){
            $where[] = ['user_id','Like','%'.\request('writer').'%'];
        }
        if (\request('category')){
            $where[] = ['category_id','=',\request('category')];
        }

        if (count($where) > 0)
            $articles = Article::where($where)->orderBy('id', 'desc')->paginate(10)->withQueryString();
        else
            $articles = Article::orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view(
            'admin.articles',
            [
                'articles'=>$articles,
                'sidebar'=>'articles'
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
            'admin/createArticle',
            [
                'sidebar'=>'articles'
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
        $request->validate(
            [
                'title' => 'required|max:255',
                'category' => 'required',
                'body'=>'required'
            ]
        );
        dd($request->tags);
        $article = auth()->user()->articles()->create(
            [
                'title'=>$request->title,
                'category_id'=>$request->category,
                'body'=>$request->body,
                'created_at'=>now(),
                'updated_at'=>now(),
                'view'=>0
            ]);
        $article->tags()->attach($request->tags);

        return redirect('admin/articles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view(
            'admin.updateArticle',
            [
                'article'=>$article,
                'sidebar'=>'articles'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'slug' => 'required|max:255',
                'category' => 'required',
                'body'=>'required'
            ]
        );
        $article->update(
            [
                'title'=>$request->title,
                'slug'=>$request->slug,
                'category'=>$request->category,
                'body'=>$request->body,
                'updated_at'=>now()
            ]
        );
        return redirect('admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return back();
    }
}
