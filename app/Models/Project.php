<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'source_language_id',
        'target_languages_ids',
        'use_machine_translate',
    ];

    protected $casts = [
        'target_languages_ids' => 'array',
        'use_machine_translate' => 'boolean',
    ];

    public function source(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'source_language_id');
    }

    public function targetLanguages(): Collection
    {
        return Language::query()
            ->whereIn('id', $this->target_languages_ids)
            ->get();
    }
}
