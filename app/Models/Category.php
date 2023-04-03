<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function select(string $string, string $string1)
    {
    }

    public function articles(){

        return $this->belongsToMany(Article::class,'article_categories',
            'category_id',
            'article_id');

    }

    use HasFactory;
}
