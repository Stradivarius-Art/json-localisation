<?php

namespace App\Models;

use App\Models\Document;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $source_language_id
 * @property int|null $user_id
 * @property array|null $target_languages_ids
 * @property bool|null $use_machine_translate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Collection<int, Document> $documents
 * @property-read int|null $documents_count
 * @property-read \App\Models\Language|null $source
 * @property-read User|null $user
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
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserId($value)
 * @property-read Collection<int, \App\Models\Team> $teams
 * @property-read int|null $teams_count
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

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function hasAccess(): bool
    {
        return $this->user_id === authUserId();
    }

    public function hasLang(int $langId): bool
    {
        return in_array($langId, $this->target_languages_ids);
    }

    public function languagesTarget(): int
    {
        return count($this->target_languages_ids);
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }
    public function performersCount()
    {
        $performerCounts = Team::query()
            ->where('project_id', $this->id)
            ->count('performer_id');
        return $performerCounts;

    }

}