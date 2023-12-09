<?php

namespace App\Enum;

enum Document: string {
    case Created = 'created';
    case InProgress = 'in progress';
    case Completed = 'completed';
}
