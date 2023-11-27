<?php

namespace App\DTO;

use App\Enum\Account;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AccountDTO extends Data
{
    public string $name;
    public string $email;
    public Account $accountType;
    public string $companyName;
    #[MapInputName('password.value')]
    public string $password_value;
}