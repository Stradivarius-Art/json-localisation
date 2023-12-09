<?php

namespace App\Facades;

use App\Models\Project;
use Illuminate\Support\Facades\Facade;

class Document extends Facade
{
    /**
     * @method static \App\Services\Document\DocumentService add(array $document)
     * @method static \App\Services\Document\DocumentService setProject(Project|int $project)
     * @see \App\Services\Document\DocumentService
     */

    protected static function getFacadeAccessor(): string
    {
        return 'documents';
    }
}