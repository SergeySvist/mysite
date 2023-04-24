<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @method static Builder|Project newModelQuery()
 * @method static Builder|Project newQuery()
 * @method static Builder|Project query()
 * @method static Builder|Project whereCreatedAt($value)
 * @method static Builder|Project whereDescription($value)
 * @method static Builder|Project whereId($value)
 * @method static Builder|Project whereTitle($value)
 * @method static Builder|Project whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class, 'tags_projects');
    }
}
