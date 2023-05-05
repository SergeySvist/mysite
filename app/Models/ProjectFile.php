<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
