<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Project as FacadesProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\Project\MinifiedProjectResource;
use App\Http\Resources\Project\ProjectCreateResource;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index()
    {
        return MinifiedProjectResource::collection(
            Project::query()
                ->where('user_id', auth()->id())
                ->get()
        );
    }
    public function store(StoreProjectRequest $request)
    {
        return new ProjectCreateResource(FacadesProject::create($request->data()));
    }
    public function show(Project $project)
    {
        return new ProjectCreateResource($project);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        return new ProjectCreateResource(
            FacadesProject::setProject($project)
                ->update($request->data())
        );
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return responseOk();
    }
}
