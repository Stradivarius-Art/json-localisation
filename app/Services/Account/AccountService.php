<?php

namespace App\Services\Account;

use App\DTO\AccountDTO;
use App\Exceptions\Account\InvalidDataException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountService
{
    public function create(AccountDTO $data)
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password_value,
            'account_type' => $data->accountType,
            'company_name' => $data->companyName,
        ]);
    }

    public function signIn(string $email, string $password): string
    {
        $user = User::query()
            ->where('email', $email)
            ->first();

        if (!empty($user)) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return $user->createToken('api-token')->plainTextToken;
            }
        }

        throw new InvalidDataException;
    }
}
