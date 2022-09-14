<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id',
        'name',
        'contact',
        'is_active'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
