<?php

namespace App\Http\Requests\Project;

use App\DTO\ProjectDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:200'],
            'languages' => ['nullable', 'array', 'required_array_keys:source,target'],
            'languages.source' => ['nullable', 'int', 'exists:languages,id'],
            'languages.target' => ['nullable'],
            'languages.target*' => ['int', 'exists:languages,id'],
            'settings.useMachineTranslate' => ['boolean', 'nullable'],
        ];
    }

    public function data(): ProjectDTO
    {
        return ProjectDTO::from($this->validated());
    }
}
