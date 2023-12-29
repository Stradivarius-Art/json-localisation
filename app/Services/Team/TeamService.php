<?php

namespace App\Services\Team;

use App\DTO\TeamDTO;
use App\Models\Team;

class TeamService
{
    public function performerCreate(TeamDTO $teamDTO)
    {
        Team::query()->create([
            'performer_id' => $teamDTO->performerId,
            'project_id' => $teamDTO->projectId,
        ]);
    }
}
