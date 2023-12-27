<?php

namespace App\Models;

use App\Enum\Document as EnumDocument;
use App\Models\Project;
use App\Models\Translation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Document
 *
 * @property int $id
 * @property int|null $project_id
 * @property string|null $name
 * @property array|null $data
 * @property float|null $progress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Project|null $project
 * @method static \Database\Factories\DocumentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translation> $translations
 * @property-read int|null $translations_count
 * @mixin \Eloquent
 */
class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'data',
        'progress',
        'created_at',
    ];

    protected $casts = [
        'data' => 'array',
        'progress' => 'float',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class);
    }

    public function status(): EnumDocument
    {
        if ($this->progress === 0) {
            return EnumDocument::Created;
        } elseif ($this->progress > 0 && $this->progress < 100) {
            return EnumDocument::InProgress;
        }

        return EnumDocument::Completed;
    }

    public function segmentsCount(): int
    {
        return count($this->data);
    }

    public function totalSegments(): int
    {
        return $this->segmentsCount() * $this->project->languagesTarget();
    }

    public function translatedSegmentsCount(): int
    {
        $translatedSegmentsCount = 0;

        foreach ($this->translations as $translation) {
            $translatedSegmentsCount += $translation->translatedSegmentsCount();
        }
        return $translatedSegmentsCount;
    }
}