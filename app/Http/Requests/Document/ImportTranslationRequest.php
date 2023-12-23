<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class ImportTranslationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'lang' => ['required', 'exists:languages,id'],
            'data' => ['required', 'array'],
            'data.*.key' => ['required', 'string'],
            'data.*.value' => ['required', 'string'],
        ];
    }
}