<?php

namespace App\Models;

use App\Models\Link;
use App\Models\User;
use App\Models\AppCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppList extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'is_active',
        'user_id',
        'app_category_id',
        'link_id',
        'slug',
        'title',
        'description',
        'file',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(AppCategory::class, 'app_category_id', 'id');
    }

    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class, 'link_id', 'id');
    }
}
