<?php

namespace App\Models;

use App\Models\File;
use App\Models\Link;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NavigationFooter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'is_active',
        'user_id',
        'parent_id',
        'modelable_type',
        'modelable_id',
        'order',
        'slug',
        'title',
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

    public function determineOrderColumnName(): string
    {
        return 'order';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function modelable(): MorphTo
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(NavigationFooter::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(NavigationFooter::class, 'parent_id');
    }

    public function announcement(): BelongsTo
    {
        return $this->belongsTo(Announcement::class, 'modelable_id', 'id');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'modelable_id', 'id');
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class, 'modelable_id', 'id');
    }

    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class, 'modelable_id', 'id');
    }
}
