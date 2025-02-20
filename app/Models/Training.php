<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Training extends Model
{
    protected $fillable = [   'title', 'slug', 'image', 'body', 'category', 'harga', 'package','date'];
    use HasFactory ;
    use Sluggable;

   
     
    public static function getRecentNews($limit = 5)
    {
        return self::orderBy('created_at', 'desc')->take($limit)->get();
    }


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
}
