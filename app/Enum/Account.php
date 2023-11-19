<?php

namespace App\Enum;

enum Account: string {
    case Freelancer = 'freelancer';
    case Ltd = 'ltd';
    case Individual = 'individual';
}
