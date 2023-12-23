<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\Language\LanguageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedProjectResource extends JsonResource
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
            "languages" => [
                "source" => new LanguageResource($this->source),
                "target" => LanguageResource::collection(
                    $this->targetLanguages()
                ),
            ],
            "performersCount" => $this->performersCount,
            "documentsCount" => $this->documentsCount,
            "useMachineTranslate" => $this->use_machine_translate,
            "createdAt" => date($this->created_at),
        ];
    }
}
