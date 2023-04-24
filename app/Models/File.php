<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
