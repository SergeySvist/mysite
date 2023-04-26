<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

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

    const DEFAULT_URL = '';

    protected $fillable = [
        'original_name', 'original_extension',
        'path', 'mimetype_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected function mimeTypes(): BelongsTo{
        return $this->belongsTo(MimeType::class);
    }

    protected function mimeType(): hasOne{
        return $this->hasOne(MimeType::class, 'id', 'mimetype_id');
    }

    public function url(): Attribute{
        return Attribute::make(
            get: function (){
                if(Storage::exists($this->path))
                    return asset('storage/' . $this->path);

                return self::DEFAULT_URL;
            }
        );
    }

    public function mimeTypeTitle(): Attribute{
        return Attribute::make(
            get: fn() => $this->mimeType->title
        );
    }

}
