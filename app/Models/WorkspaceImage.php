<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkspaceImage extends Model
{
    use HasFactory;

    protected $fillable = ['workspace_id', 'image'];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}
