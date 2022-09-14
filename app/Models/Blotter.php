<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blotter extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'complainant',
        'respondent',
        'incharge',
        'statement',
        'is_solved'
    ];


    // ========================== Custom Methods ======================================================

    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('card')
        ->width(450)
        ->nonQueued();
    }

}
