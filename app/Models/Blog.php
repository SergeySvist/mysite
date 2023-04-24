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
 * App\Models\Blog
 *
 * @property int $id
 * @property string $title
 * @property string $main_text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @method static Builder|Blog newModelQuery()
 * @method static Builder|Blog newQuery()
 * @method static Builder|Blog query()
 * @method static Builder|Blog whereCreatedAt($value)
 * @method static Builder|Blog whereId($value)
 * @method static Builder|Blog whereMainText($value)
 * @method static Builder|Blog whereTitle($value)
 * @method static Builder|Blog whereUpdatedAt($value)
 * @mixin Eloquent
 */
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
