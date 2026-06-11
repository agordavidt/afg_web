<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'excerpt', 'body',
        'featured_image_url', 'reading_time_minutes',
        'is_published', 'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // ── BOOT ─────────────────────────────────────────────────────────────────

    protected static function boot(): void
    {
        parent::boot();

        static::saving(function (self $article) {
            if (empty($article->slug)) {
                $article->slug = static::uniqueSlug($article->title, $article->id);
            }

            // Set published_at timestamp on first publish
            if ($article->is_published && ! $article->published_at) {
                $article->published_at = Carbon::now();
            }
        });
    }

    // ── SCOPES ───────────────────────────────────────────────────────────────

    public function scopePublished(Builder $q): Builder
    {
        return $q->where('is_published', true)
                 ->whereNotNull('published_at');
    }

    public function scopeByCategory(Builder $q, string $cat): Builder
    {
        return $q->where('category', $cat);
    }

    // ── ACCESSORS ────────────────────────────────────────────────────────────

    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'remote'     => 'Remote work',
            'scholarship'=> 'Scholarships',
            'platforms'  => 'Platforms & tools',
            'career'     => 'Career',
            default      => ucfirst($this->category),
        };
    }

    public function getFormattedDateAttribute(): string
    {
        $date = $this->published_at ?? $this->created_at;
        return $date ? $date->format('M j, Y') : '';
    }

    // ── HELPERS ──────────────────────────────────────────────────────────────

    public static function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i    = 1;

        while (
            static::where('slug', $slug)
                  ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                  ->exists()
        ) {
            $slug = "{$base}-" . $i++;
        }

        return $slug;
    }
}