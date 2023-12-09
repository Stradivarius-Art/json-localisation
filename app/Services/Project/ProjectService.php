<?php

namespace App\Services\Project;

use App\DTO\ProjectDTO;
use App\Models\Project;

class ProjectService
{
    private Project $project;

    public function create(ProjectDTO $projectDTO): Project
    {
        $projects = Project::create([
            'name' => $projectDTO->name,
            'description' => $projectDTO->description,
            'source_language_id' => $projectDTO->languages_source,
            'target_languages_ids' => $projectDTO->languages_target,
            'use_machine_translate' => $projectDTO->use_machine_translate,
            'user_id' => authUserId(),
        ]);

        return $projects;
    }

    public function update(ProjectDTO $projectDTO)
    {
        $this->project->update([
            'name' => $projectDTO->name,
            'description' => $projectDTO->description,
            'use_machine_translate' => $projectDTO->use_machine_translate,
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
