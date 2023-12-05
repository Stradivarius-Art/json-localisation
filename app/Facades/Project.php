<?php

namespace App\Facades;

use App\DTO\ProjectDTO;
use Illuminate\Support\Facades\Facade;

class Project extends Facade
{
    /**
     * @method static \App\Models\Project create(ProjectDTO $projectDTO)
     * @method static \App\Services\Project\ProjectService setProject(\App\Models\Project $project)
     * @see \App\Services\Project\ProjectService
     */

    protected static function getFacadeAccessor(): string
    {
        return 'projects';
    }
}
