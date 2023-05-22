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
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\PersonalInfo
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $description
 * @property int $avatar_id
 * @property int $cv_id
 * @property int $language_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Link> $links
 * @property-read int|null $links_count
 * @method static Builder|PersonalInfo newModelQuery()
 * @method static Builder|PersonalInfo newQuery()
 * @method static Builder|PersonalInfo query()
 * @method static Builder|PersonalInfo whereAvatarId($value)
 * @method static Builder|PersonalInfo whereCreatedAt($value)
 * @method static Builder|PersonalInfo whereCvId($value)
 * @method static Builder|PersonalInfo whereDescription($value)
 * @method static Builder|PersonalInfo whereId($value)
 * @method static Builder|PersonalInfo whereLanguageId($value)
 * @method static Builder|PersonalInfo whereName($value)
 * @method static Builder|PersonalInfo whereSurname($value)
 * @method static Builder|PersonalInfo whereUpdatedAt($value)
 * @property-read \App\Models\File|null $avatar
 * @property-read \App\Models\File|null $cv
 * @property-read \App\Models\Language|null $language
 * @property-read \App\Models\Language|null $languages
 * @mixin Eloquent
 */
class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name', 'surname',
        'description',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
        'avatar_id', 'cv_id', 'language_id',
        'languageInfo', 'language',
        'cv', 'avatar', 'cvUrl', 'avatarUrl'
    ];

    protected $appends = [
        'language_info', 'cv_url', 'avatar_url',
    ];


    public function languages(): BelongsTo{
        return $this->belongsTo(Language::class);
    }

    public function language(): hasOne{
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function avatar(): hasOne{
        return $this->hasOne(File::class, 'id', 'avatar_id');
    }

    public function cv(): hasOne{
        return $this->hasOne(File::class, 'id', 'cv_id');
    }

    public function languageInfo(): Attribute{
        return Attribute::make(
            get: fn() => $this->language
        );
    }

    public function avatarUrl(): Attribute{
        return Attribute::make(
            get: fn() => $this->avatar->url
        );
    }

    public function cvUrl(): Attribute{
        return Attribute::make(
            get: fn() => $this->cv->url
        );
    }

}
