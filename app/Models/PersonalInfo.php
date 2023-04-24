<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'surname',
        'description',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
        'avatar_id', 'cv_id', 'language_id',
    ];

    public function links(): BelongsToMany{
        return $this->belongsToMany(Link::class, 'links_personal_infos');
    }
}
