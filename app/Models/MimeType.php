<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\MimeType
 *
 * @property int $id
 * @property string $title
 * @method static Builder|MimeType newModelQuery()
 * @method static Builder|MimeType newQuery()
 * @method static Builder|MimeType query()
 * @method static Builder|MimeType whereId($value)
 * @method static Builder|MimeType whereTitle($value)
 * @mixin Eloquent
 */
class MimeType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
       'id', 'title',
    ];

    protected function file(): HasMany{
        return $this->hasMany(File::class);
    }

}
