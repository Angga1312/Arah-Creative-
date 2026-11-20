<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'client_name',
        'description',
        'image',
        'project_year',
        'status',
    ];

    /**
     * Relasi Portfolio dimiliki oleh satu Category
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
            // Cek jika path langsung di public/ (misal: images/portfolio/...)
            if (file_exists(public_path($this->image))) {
                return asset($this->image);
            }

            // Cek jika path di storage/ (misal: portfolios/...)
            if (file_exists(public_path('storage/' . $this->image))) {
                return asset('storage/' . $this->image);
            }

            // Fallback direktori public/images/portfolio/
            if (file_exists(public_path('images/portfolio/' . basename($this->image)))) {
                return asset('images/portfolio/' . basename($this->image));
            }
        }

        return asset('images/placeholders/portfolio-placeholder.svg');
    }

    /**
     * Scope untuk portfolio aktif / published
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });
    }
}
