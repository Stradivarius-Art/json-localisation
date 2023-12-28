<?php

namespace App\Http\Requests\Team;

use App\DTO\TeamDTO;
use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'projectId' => ['required', 'exists:projects,id', 'integer'],
            'performerId' => ['required', 'exists:users,id', 'integer'],
        ];
    }

    public function data(): TeamDTO
    {
        return TeamDTO::from($this->validated());
    }
}