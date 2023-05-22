<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
 * @property int $language_id
 * @property-read Collection<int, \App\Models\BlogFile> $blogFiles
 * @property-read int|null $blog_files_count
 * @property-read \App\Models\Language|null $language
 * @property-read \App\Models\Language|null $languages
 * @property-read Collection<int, \App\Models\Tag> $tags
 * @method static Builder|Blog whereLanguageId($value)
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
        'blogFiles', 'tags', 'language_id',
        'languageInfo', 'language',
    ];

    protected $appends = [
        'blog_files_data', 'tags_titles', 'language_info',
    ];

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class, 'tags_blogs');
    }

    public function languages(): BelongsTo{
        return $this->belongsTo(Language::class);
    }

    public function language(): hasOne{
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function blogFiles(): HasMany{
        return $this->hasMany(BlogFile::class);
    }

    public function blogFilesData(): Attribute{
        return Attribute::make(
            get: fn() => $this->blogFiles
        );
    }

    public function tagsTitles(): Attribute{
        return Attribute::make(
            get: fn() => $this->tags
        );
    }

    public function languageInfo(): Attribute{
        return Attribute::make(
            get: fn() => $this->language
        );
    }

}
