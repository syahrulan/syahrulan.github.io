<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Workspace extends Model
{
    protected $fillable = [ 'title','image','slug','body'];
    use HasFactory, Sluggable;
    

   
     
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
            'slug' =>[
                'source'=> 'title'
            ]
            ];
    }
}
