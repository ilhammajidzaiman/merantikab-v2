<?php

namespace App\Models;

use App\Models\AppList;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppShortcut extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'is_active',
        'user_id',
        'app_list_id',
        'order',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected $casts = [
        'is_active' => 'boolean',
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

    public function appList(): BelongsTo
    {
        return $this->belongsTo(AppList::class, 'app_list_id', 'id');
    }
}
