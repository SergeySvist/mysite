<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Link extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'link',
    ];

    protected $hidden = [
        'picture_id',
    ];
    public function personalInfos(): BelongsToMany{
        return $this->belongsToMany(PersonalInfo::class, 'links_personal_infos');
    }

}
