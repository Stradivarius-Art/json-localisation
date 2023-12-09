<?php

namespace App\Http\Middleware\Document;

use App\Exceptions\Account\NoAccessToOperationException;
use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetDocumentsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Project $project */
        $project = Project::query()
            ->find(
                $request->get('projectId')
            );

        if (!is_null($project) && !$project->hasAccess()) {
            throw new NoAccessToOperationException();
        }

        return $next($request);
    }
}
