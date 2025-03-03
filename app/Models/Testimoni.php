<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;


class Testimoni extends Model
{
    protected $fillable = [ 'title','slug','body','video_url'];
    protected $table = 'testimonis';
    use Sluggable;
    use HasFactory;

 

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title' // or the attribute you want to generate the slug from
            ]
        ];
    }


}