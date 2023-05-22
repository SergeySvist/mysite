<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Experiences
 *
 * @property int $id
 * @property string $description
 * @property int $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Language|null $language
 * @property-read \App\Models\Language|null $languages
 * @method static \Illuminate\Database\Eloquent\Builder|Experiences newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experiences newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experiences query()
 * @method static \Illuminate\Database\Eloquent\Builder|Experiences whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experiences whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experiences whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experiences whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experiences whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Experiences extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'description',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
        'language_id',
        'languageInfo', 'language',
    ];
    protected $appends = [
        'language_info',
    ];

    public function languages(): BelongsTo{
        return $this->belongsTo(Language::class);
    }

    public function language(): hasOne{
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function languageInfo(): Attribute{
        return Attribute::make(
            get: fn() => $this->language
        );
    }

}
