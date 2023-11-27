<?php

namespace App\Facades;

use App\DTO\AccountDTO;
use Illuminate\Support\Facades\Facade;

class Account extends Facade
{
    /**
     *
     *
     * @method static \App\Models\User create(AccountDTO $data)
     * @method static string signIn(string $email, string $password)
     *
     * @see \App\Services\Account\AccountService
     */
    protected static function getFacadeAccessor()
    {
        return 'account_service';
    }
}
