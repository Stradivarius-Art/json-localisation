<?php

namespace App\Http\Middleware\Document;

use App\Exceptions\Account\NoAccessToOperationException;
use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddDocumentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Project $project */
        $project = Project::query()
            ->find(
                $request->input('projectId')
            );

        if (!is_null($project) && !$project->hasAccess()) {
            throw new NoAccessToOperationException();
        }

        return $next($request);
    }
}