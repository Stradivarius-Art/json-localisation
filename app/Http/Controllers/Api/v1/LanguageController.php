<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Language\LanguageResource;
use App\Models\Language;

class LanguageController extends Controller
{
    public function list()
    {
        return LanguageResource::collection(Language::all());
    }
}