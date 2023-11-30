<?php

namespace App\Services\Project;

use App\DTO\CreateProjectDTO;
use App\Models\Project;

class ProjectService
{
    private Project $project;

    public function create(CreateProjectDTO $createProjectDTO): Project
    {

        $projects = Project::create([
            'name' => $createProjectDTO->name,
            'description' => $createProjectDTO->description,
            'source_language_id' => $createProjectDTO->languages_source,
            'target_languages_ids' => $createProjectDTO->languages_target,
            'use_machine_translate' => $createProjectDTO->use_machine_translate,
            'user_id' => auth()->id(),
        ]);

        return $projects;
    }

    public function update(CreateProjectDTO $createProjectDTO)
    {
        $this->project->update([
            'name' => $createProjectDTO->name,
            'description' => $createProjectDTO->description,
            'use_machine_translate' => $createProjectDTO->use_machine_translate,
        ]);

        return $this->project;
    }

    /**
     * Undocumented function
     *
     * @param Project $project
     * @return ProjectService
     */
    public function setProject(Project $project): ProjectService
    {
        $this->project = $project;
        return $this;
    }
}
