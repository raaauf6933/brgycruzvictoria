<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'purok_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birth_date',
        'address',
        'contact',
        'civil_status',
        'citizenship',
        'is_voter'
    ];

    // ==============================Relationship==================================================


    public function purok()
    {
        return $this->belongsTo(Purok::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    // ============================== Accessor & Mutator ==========================================

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
