<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use function MongoDB\BSON\toRelaxedExtendedJSON;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name_fa',
        'is_delete'
    ];
}
