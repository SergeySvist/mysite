<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property-read Collection<int, Blog> $blogs
 * @property-read int|null $blogs_count
 * @property-read Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @method static Builder|Tag newModelQuery()
 * @method static Builder|Tag newQuery()
 * @method static Builder|Tag query()
 * @method static Builder|Tag whereId($value)
 * @method static Builder|Tag whereSlug($value)
 * @method static Builder|Tag whereTitle($value)
 * @mixin Eloquent
 */
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
