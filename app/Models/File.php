<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $original_name
 * @property string $original_extension
 * @property string $path
 * @property int $mimetype_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|File newModelQuery()
 * @method static Builder|File newQuery()
 * @method static Builder|File query()
 * @method static Builder|File whereCreatedAt($value)
 * @method static Builder|File whereId($value)
 * @method static Builder|File whereMimetypeId($value)
 * @method static Builder|File whereOriginalExtension($value)
 * @method static Builder|File whereOriginalName($value)
 * @method static Builder|File wherePath($value)
 * @method static Builder|File whereUpdatedAt($value)
 * @mixin Eloquent
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name', 'original_extension',
        'path',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'mimetype_id',
    ];

    protected function mimeTypes(): BelongsTo{
        return $this->belongsTo(MimeType::class);
    }
}
