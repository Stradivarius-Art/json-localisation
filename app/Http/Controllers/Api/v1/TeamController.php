<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Team;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamRequest;
use App\Http\Resources\Team\TeamResource;
use App\Models\Project;

class TeamController extends Controller
{
    public function performCreate(TeamRequest $request)
    {
        Team::performerCreate($request->data());
        return responseCreated();
    }

    public function performShow()
    {

        return TeamResource::collection(
            Project::query()
                ->where('user_id')
                ->get()
        );
    }
}
