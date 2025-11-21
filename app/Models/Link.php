<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\NavigationMenu;
use App\Models\NavigationFooter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'is_active',
        'user_id',
        'slug',
        'title',
        'url',
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

    public function navigationMenu(): MorphOne
    {
        return $this->morphOne(NavigationMenu::class, 'modelable');
    }

    public function navigationFooter(): MorphOne
    {
        return $this->morphOne(NavigationFooter::class, 'modelable');
    }
}
