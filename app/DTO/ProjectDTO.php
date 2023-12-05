<?php

namespace App\DTO;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class ProjectDTO extends Data
{
    public string $name;
    public string $description;

    #[MapInputName('languages.source')]
    public int $languages_source;

    #[MapInputName('languages.target')]
    public $languages_target;

    #[MapInputName('settings.useMachineTranslate')]
    public bool $use_machine_translate;
}