<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Account extends Facade
{
    /**
     *
     *
     * @method static \App\Models\User create(array $data)
     * @see \App\Services\Account\AccountService
     */
    protected static function getFacadeAccessor()
    {
        return 'account_service';
    }
}
