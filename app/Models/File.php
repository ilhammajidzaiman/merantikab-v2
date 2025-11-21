<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\FileCategory;
use App\Models\NavigationMenu;
use App\Models\NavigationFooter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'is_active',
        'user_id',
        'file_category_id',
        'slug',
        'title',
        'description',
        'file',
        'attachment',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'attachment' => 'array',
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
        return $this->belongsTo(FileCategory::class, 'file_category_id', 'id');
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
