<?php

namespace App\Http\Middleware;

use App\Exceptions\Project\InvalidLanguageException;
use App\Models\Document;
use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProjectTargetLangMiddleware
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     * @throws InvalidLanguageException
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Document $document */
        $document = $request->route('document');

        $langId = $request->input('lang');

        /**@var Project $project */
        $project = $document->project;

        if (!$project->hasLang($langId)) {
            throw new InvalidLanguageException();
        }

        return $next($request);
    }
}