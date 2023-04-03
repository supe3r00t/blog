<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'title',
        'user_id',
        'content'
    ];

    protected $dates = ['delete_at'];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'article_categories',
            'article_id',
            'category_id');


    }

    public function comments(){

        return $this->hasMany(Comment::class);
    }
}

