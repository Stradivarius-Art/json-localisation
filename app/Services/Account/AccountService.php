<?php

namespace App\Services\Account;

use App\Models\User;
use Illuminate\Support\Arr;

class AccountService
{
    public function create(array $data)
    {
        return User::query()->create([
            'name' => Arr::get($data, 'name'),
            'email' => Arr::get($data, 'email'),
            'password' => Arr::get($data, 'password.value'),
            'account_type' => Arr::get($data, 'accountType'),
            'company_name' => Arr::get($data, 'companyName'),
        ]);
    }
}
