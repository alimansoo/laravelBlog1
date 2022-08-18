<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

class Article extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'body',
        'user_id',
        'view'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function user_fullname(){
        return $this->user->fname.' '.$this->user->lname;
    }
    public function body_limited(){
        return Str::limit($this->body,150, $end='...');
    }
    public function title_limited(){
        return Str::limit($this->title,50, $end='...');
    }
    public function jalali_date(){
        return Jalalian::forge($this->created_at)->format('%B %d، %Y');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
