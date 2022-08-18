<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;
use App\Models\Tag;

class HomeController extends Controller
{
    public function info(){
        dd(
            auth()->user()
        );
    }
    public function index(){
//        Mail::to("alimansoori@gmail.com")->send(
//            new TestMail("Mohammad Mansoori")
//        );
        $articles = Article::orderBy('id', 'desc')->paginate(5);
        return view(
            'Index',
            compact(
                'articles'
            )
        );
    }
    public function article(Article $article){
        return view(
            'article',
            compact(
                'article'
            )
        );
    }
    public function category(Category $category){
        $articles = Article::where(
            [
                'category_id'=>$category->id
            ]
        )->paginate(5);
        return view(
            'search',
            compact(
                'articles'
            )
        );
    }
    public function writer(User $user){
        $articles = $user->articles()->orderByDesc("id")->paginate(5);
        return view(
            'search',
            compact(
                'articles' ,
            )
        );
    }
    public function tag(Tag $tag){
        $articles = $tag->articles()->orderByDesc("id")->paginate(5);
        return view(
            'search',
            compact(
                'articles' ,
            )
        );
    }
}
