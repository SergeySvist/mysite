<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FileType
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @method static Builder|FileType newModelQuery()
 * @method static Builder|FileType newQuery()
 * @method static Builder|FileType query()
 * @method static Builder|FileType whereId($value)
 * @method static Builder|FileType whereSlug($value)
 * @method static Builder|FileType whereTitle($value)
 * @mixin Eloquent
 */
class FileType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'slug',
    ];
}
