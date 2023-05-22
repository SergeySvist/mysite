<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\BlogFile
 *
 * @property int $id
 * @property int $blog_id
 * @property int $file_id
 * @property int $filetype_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\File|null $file
 * @property-read \App\Models\FileType|null $fileType
 * @method static \Illuminate\Database\Eloquent\Builder|BlogFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogFile whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogFile whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogFile whereFiletypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id', 'file_id', 'filetype_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'file', 'fileType',
    ];

    protected $appends = [
        'file_url', 'file_type_title',
    ];


    protected function fileTypes(): BelongsTo{
        return $this->belongsTo(FileType::class);
    }

    protected function blogs(): BelongsTo{
        return $this->belongsTo(Blog::class);
    }

    public function file(): hasOne{
        return $this->hasOne(File::class, 'id', 'file_id');
    }

    public function fileType(): hasOne{
        return $this->hasOne(FileType::class, 'id', 'filetype_id');
    }

    public function fileUrl(): Attribute{
        return Attribute::make(
            get: fn() => $this->file->url
        );
    }

    public function fileTypeTitle(): Attribute{
        return Attribute::make(
            get: fn() => $this->fileType->title
        );
    }

}
