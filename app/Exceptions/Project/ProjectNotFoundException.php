<?php

namespace App\Exceptions\Project;

use Exception;

class ProjectNotFoundException extends Exception
{
    protected $message = 'Project not found';
}