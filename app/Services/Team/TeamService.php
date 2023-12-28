<?php

namespace App\Services\Team;

use App\DTO\TeamDTO;
use App\Models\Project;

class TeamService
{
    private Project $project;
    public function performerCreate(TeamDTO $teamDTO)
    {
        $this->project->teams()->create([
            'performer_id' => $teamDTO->performerId,
        ]);
    }
    public function setProject(Project | int $project)
    {
        $this->project = $project instanceof Project
        ? $project
        : Project::query()->findOrFail($project);
        return $this;
    }
}
