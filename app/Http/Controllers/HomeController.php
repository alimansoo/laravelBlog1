<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{
    public function home(){
        $categories = $this->Categories();
        $articles = Article::paginate(5);
        foreach ($articles as $key=>$article){
            $writerId = $article->writerId;
            $writer = User::findOrFail($writerId);
            $article->body = Str::limit($article->body,150, $end='...');
            $article['jalaliCreatedAt'] = Jalalian::forge($article->created_at)->format('%B %d، %Y');
            $article['writerFullName'] = $writer->fname.' '.$writer->lname;
            $article['CategtoryName'] = Category::findOrFail(
                $article->category
            )->name_fa;
            $articles[$key] = $article;
        }
        return view(
            'Index',
            compact(
                'articles',
                'categories'
            )
        );
    }
    public function article(Article $article){
        $categories = $this->Categories();
        $article['jalaliCreatedAt'] = Jalalian::forge($article->created_at)->format('%B %d، %Y');
        $writer = User::findOrFail($article['writerId']);
        $article['CategtoryName'] = Category::findOrFail(
            $article->category
        )->name_fa;
        $article['writerFullName'] = $writer->fname.' '.$writer->lname;
        return view(
            'article',
            compact(
                'article',
                'categories'
            )
        );
    }
    public function category(Category $category){
        $articles = Article::where(
            [
                'category'=>$category->id
            ]
        )->paginate(5);
        foreach ($articles as $key=>$article){
            $writerId = $article->writerId;
            $writer = User::findOrFail($writerId);
            $article->body = Str::limit($article->body,150, $end='...');
            $article['jalaliCreatedAt'] = Jalalian::forge($article->created_at)
                ->format('%B %d، %Y');

            $article['writerFullName'] = $writer->fname.' '.$writer->lname;
            $article['CategtoryName'] = Category::findOrFail(
                $article->category
            )->name_fa;
            $articles[$key] = $article;
        }
        $categories = $this->Categories();
        return view(
            'search',
            compact(
                'articles' ,
                'categories'
            )
        );
    }
    public function Categories(){
        return Category::where([
            'is_delete'=>0
        ])->get();
    }
}
