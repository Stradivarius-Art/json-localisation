<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\Language\LanguageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "progress" => $this->progress,
            "languages" => [
                "source" => new LanguageResource($this->source),
                "target" => LanguageResource::collection(
                    $this->targetLanguages()
                ),
            ],
            "documents" => [],
            "performers" => [],
            "settings" => [
                "useMachineTranslate" => $this->use_machine_translate,
            ],

            "createdAt" => $this->created_at,
        ];
    }
}
