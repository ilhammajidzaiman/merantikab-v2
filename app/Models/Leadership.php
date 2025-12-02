<?php

namespace App\Models;

use App\Models\User;
use App\Models\Leader;
use App\Enums\PositionEnum;
use Illuminate\Support\Str;
use App\Models\LeadershipPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leadership extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'is_active',
        'user_id',
        'leader_id',
        'leadership_period_id',
        'position',
        'description',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'position' => PositionEnum::class,
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function leader(): BelongsTo
    // {
    //     return $this->belongsTo(Leader::class, 'leader_id', 'id');
    // }

    // public function period(): BelongsTo
    // {
    //     return $this->belongsTo(LeadershipPeriod::class, 'leadership_period_id', 'id');
    // }



    public function period()
    {
        return $this->belongsTo(LeadershipPeriod::class, 'leadership_period_id');
    }

    public function leader()
    {
        return $this->belongsTo(Leader::class);
    }
}
