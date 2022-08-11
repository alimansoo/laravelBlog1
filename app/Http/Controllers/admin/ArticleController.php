<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;
use Dotenv\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::orderBy('id', 'desc');
        $articles = $article->paginate(10)->withQueryString();
        foreach ($articles as $key=>$article){
            $writerId = $article->writerId;
            $writer = User::findOrFail($writerId);
            $article->title = Str::limit($article->title,40, $end='...');
            $article['jalaliCreatedAt'] = Jalalian::forge($article->created_at)->format('%B %d، %Y');
            $article['writerFullName'] = $writer->fname.' '.$writer->lname;
            $article['CategtoryName'] = Category::findOrFail(
                $article->category
            )->name_fa;
            $articles[$key] = $article;
        }
        $categories = Category::where([
            'is_delete'=>false
        ])->get();
        return view(
            'admin.articles',
            [
                'articles'=>$articles,
                'categories'=>$categories,
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
        $categories = Category::where([
            'is_delete'=>false
        ])->get();
        return view(
            'admin/createArticle',
            [
                'categories'=>$categories,
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
    public function store(Request $request,Faker $faker)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'category' => 'required',
                'body'=>'required'
            ]
        );
        Article::create(
            [
                'title'=>\request('title'),
                'slug'=>$faker->slug(1),
                'category'=>2,
                'body'=>$request->body,
                'writerId'=>3,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
        );
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
        $categories = Category::where([
            'is_delete'=>false
        ])->get();
        return view(
            'admin.updateArticle',
            [
                'article'=>$article,
                'categories'=>$categories,
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
