<?php

namespace App\Facades;

use App\DTO\TeamDTO;
use Illuminate\Support\Facades\Facade;

class Team extends Facade
{
    /**
     * @method static \App\Services\Team\TeamService performerCreate(TeamDTO $teamDTO)
     * @see \App\Services\Team\TeamService
     */

    protected static function getFacadeAccessor()
    {
        return 'team';
    }
}
