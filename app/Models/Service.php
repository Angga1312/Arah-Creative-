<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'status',
    ];

    /**
     * Relasi Service dimiliki oleh satu Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Accessor URL Gambar
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            // Check direct path in public/ first (e.g. images/services/brand-strategy.jpg)
            if (file_exists(public_path($this->image))) {
                return asset($this->image);
            }
            // Fallback: storage-linked path
            if (file_exists(public_path('storage/' . $this->image))) {
                return asset('storage/' . $this->image);
            }
        }

        return asset('images/placeholders/service-placeholder.svg');
    }

    /**
     * Scope untuk layanan aktif / published
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });
    }
}
