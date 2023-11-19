<?php

namespace App\Exceptions\Account;

use Exception;

class InvalidDataException extends Exception
{
    protected $message = 'Invalid user data';
}
