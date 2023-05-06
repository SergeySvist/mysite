<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @method static Builder|Language newModelQuery()
 * @method static Builder|Language newQuery()
 * @method static Builder|Language query()
 * @method static Builder|Language whereId($value)
 * @method static Builder|Language whereSlug($value)
 * @method static Builder|Language whereTitle($value)
 * @mixin Eloquent
 */
class Language extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'slug',
    ];

    protected function personalInfos(): HasMany{
        return $this->hasMany(PersonalInfo::class);
    }

    protected function projects(): HasMany{
        return $this->hasMany(Project::class);
    }

    protected function blogs(): HasMany{
        return $this->hasMany(Blog::class);
    }
}
