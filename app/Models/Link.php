<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Link
 *
 * @property int $id
 * @property string $link
 * @property string $title
 * @property int $picture_id
 * @property-read Collection<int, PersonalInfo> $personalInfos
 * @property-read int|null $personal_infos_count
 * @method static Builder|Link newModelQuery()
 * @method static Builder|Link newQuery()
 * @method static Builder|Link query()
 * @method static Builder|Link whereId($value)
 * @method static Builder|Link whereLink($value)
 * @method static Builder|Link wherePictureId($value)
 * @method static Builder|Link whereTitle($value)
 * @mixin Eloquent
 */
class Link extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'link',
    ];

    public function personalInfos(): BelongsToMany{
        return $this->belongsToMany(PersonalInfo::class, 'links_personal_infos');
    }

}
