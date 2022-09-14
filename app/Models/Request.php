<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public const PENDING = 0;
    public const APPROVED = 1;
    public const DECLINED = 2;

    protected $fillable = [
        'user_id',
        'service_id',
        'purpose',
        'business_name',
        'resident_type',
        'residency_year',
        'status',
        'remark',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
