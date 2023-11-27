<?php

namespace App\Facades;

use App\DTO\CreateProjectDTO;
use Illuminate\Support\Facades\Facade;

class Project extends Facade
{
    /**
     * @method static App\Models\Project create(CreateProjectDTO $createProjectDTO)
     * @see \App\Services\Project\Project
     */

    protected static function getFacadeAccessor(): string
    {
        return 'projects';
    }
}