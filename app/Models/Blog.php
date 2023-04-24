<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'main_text',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class, 'tags_blogs');
    }
}
