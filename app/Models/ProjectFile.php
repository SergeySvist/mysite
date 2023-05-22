<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\ProjectFile
 *
 * @property int $id
 * @property int $project_id
 * @property int $file_id
 * @property int $filetype_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\File|null $file
 * @property-read \App\Models\FileType|null $fileType
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFile whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFile whereFiletypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFile whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'file_id', 'filetype_id',
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

    protected function project(): BelongsTo{
        return $this->belongsTo(Project::class);
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
