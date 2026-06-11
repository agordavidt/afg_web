<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Opportunity extends Model
{
    protected $fillable = [
        'title', 'slug', 'type', 'summary',
        'source_name', 'source_url', 'deadline',
        'is_active', 'is_urgent',
    ];

    protected $casts = [
        'deadline'  => 'date',
        'is_active' => 'boolean',
        'is_urgent' => 'boolean',
    ];

    // ── BOOT ─────────────────────────────────────────────────────────────────

    protected static function boot(): void
    {
        parent::boot();

        static::saving(function (self $opp) {
            // Auto-generate slug from title if not set
            if (empty($opp->slug)) {
                $opp->slug = static::uniqueSlug($opp->title, $opp->id);
            }

            // Auto-set is_urgent when deadline is within 2 days
            if ($opp->deadline) {
                $opp->is_urgent = Carbon::today()->diffInDays($opp->deadline, false) <= 2
                    && $opp->deadline->isFuture();
            }
        });
    }

    // ── SCOPES ───────────────────────────────────────────────────────────────

    public function scopeActive(Builder $q): Builder
    {
        return $q->where('is_active', true)
                 ->where(function (Builder $q) {
                     $q->whereNull('deadline')
                       ->orWhere('deadline', '>=', Carbon::today());
                 });
    }

    public function scopeByType(Builder $q, string $type): Builder
    {
        return $q->where('type', $type);
    }

    // ── ACCESSORS ────────────────────────────────────────────────────────────

    public function getDaysLeftAttribute(): int|string
    {
        if (! $this->deadline) {
            return 'Rolling';
        }

        $days = Carbon::today()->diffInDays($this->deadline, false);

        if ($days < 0) return 'Expired';
        if ($days === 0) return 'Today';

        return $days;
    }

    public function getDeadlineLabelAttribute(): string
    {
        $days = $this->days_left;

        if (is_string($days)) return $days;
        if ($days === 0)      return 'Closes today';
        if ($days === 1)      return '1 day left';

        return "{$days} days left";
    }

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'remote'     => 'Remote work',
            'scholarship'=> 'Scholarship',
            'grant'      => 'Grant',
            'training'   => 'Training',
            default      => ucfirst($this->type),
        };
    }

    public function getBadgeClassAttribute(): string
    {
        return match ($this->type) {
            'remote'     => 'badge--remote',
            'scholarship'=> 'badge--scholar',
            'grant'      => 'badge--grant',
            'training'   => 'badge--train',
            default      => '',
        };
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