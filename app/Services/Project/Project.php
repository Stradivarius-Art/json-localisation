<?php

namespace App\Services\Project;

use App\DTO\CreateProjectDTO;
use App\Models\Project as ModelsProject;

class Project
{
    public function create(CreateProjectDTO $createProjectDTO): ModelsProject
    {

        $projects = ModelsProject::create([
            'name' => $createProjectDTO->name,
            'description' => $createProjectDTO->description,
            'source_language_id' => $createProjectDTO->languages_source,
            'target_languages_ids' => $createProjectDTO->languages_target,
            'use_machine_translate' => $createProjectDTO->use_machine_translate,
            'user_id' => auth()->id(),
        ]);

        return $projects;
    }
}
