<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Workspace extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'image', 'slug', 'body',  'total_rooms', 'workshop_rooms', 'classrooms'];

    // Relasi One-to-Many ke WorkspaceImage
    public function images()
    {
        return $this->hasMany(WorkspaceImage::class);
    }

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
