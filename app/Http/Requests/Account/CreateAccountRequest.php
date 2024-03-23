<?php

namespace App\Http\Requests\Account;

use App\DTO\AccountDTO;
use App\Enum\Account;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email'],
            'accountType' => ['required', 'string', new Enum(Account::class)],
            'companyName' => ['required_if:accountType,' . Account::Ltd->value],
            'password' => ['required', 'min:6', 'max:100', 'confirmed'],
        ];
    }

    public function createAccount(): AccountDTO
    {
        return AccountDTO::from(
            $this->validated()
        );
    }
}