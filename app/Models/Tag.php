<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'slug',
    ];

    public function blogs(): BelongsToMany{
        return $this->belongsToMany(Blog::class, 'tags_blogs');
    }

    public function projects(): BelongsToMany{
        return $this->belongsToMany(Project::class, 'tags_projects');
    }
}
