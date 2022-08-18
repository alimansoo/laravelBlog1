<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use function MongoDB\BSON\toRelaxedExtendedJSON;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'slug',
        'name_fa',
        'is_delete'
    ];
    public $timestamps = false;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_fa'
            ]
        ];
    }
    public function artilce_view(){
        return Article::where('category_id',$this->id)->count();
    }
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
