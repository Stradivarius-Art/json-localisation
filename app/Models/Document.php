<?php

namespace App\Models;

use App\Enum\Document as EnumDocument;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'data',
        'progress',
    ];

    protected $casts = [
        'data' => 'array',
        'progress' => 'float',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
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


}