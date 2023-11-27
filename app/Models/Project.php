<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int $source_language_id
 * @property array|null $target_languages_ids
 * @property bool|null $use_machine_translate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Language $source
 * @method static \Database\Factories\ProjectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereSourceLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTargetLanguagesIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUseMachineTranslate($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'source_language_id',
        'target_languages_ids',
        'use_machine_translate',
        'user_id',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}