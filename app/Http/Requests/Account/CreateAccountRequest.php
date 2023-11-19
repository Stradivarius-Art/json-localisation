<?php

namespace App\Http\Requests\Account;

use App\Enum\Account;
use App\Facades\Account as FacadeAccount;
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
            'password' => ['required', 'required_array_keys:value,confirmation'],
            'password.value' => ['required', 'min:6', 'max:100'],
            'password.confirmation' => ['same:password.value'],
        ];
    }

    public function createAccount()
    {
        FacadeAccount::create(
            $this->validated()
        );
    }
}
