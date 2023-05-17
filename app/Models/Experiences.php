<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
