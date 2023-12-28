<?php

namespace App\Http\Resources\Team;

use App\Http\Resources\Language\LanguageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
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
            "createdAt" => date($this->created_at),
        ];
    }
}
