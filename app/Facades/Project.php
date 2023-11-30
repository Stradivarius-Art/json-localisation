<?php

namespace App\Facades;

use App\DTO\CreateProjectDTO;
use Illuminate\Support\Facades\Facade;

class Project extends Facade
{
    /**
     * @method static \App\Models\Project create(CreateProjectDTO $createProjectDTO)
     * @method static \App\Services\Project\ProjectService setProject(\App\Models\Project $project)
     * @see \App\Services\Project\ProjectService
     */

    protected static function getFacadeAccessor(): string
    {
        return 'projects';
    }
}
