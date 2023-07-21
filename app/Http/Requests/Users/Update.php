<?php

declare(strict_types=1);

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'string', 'max:250', 'unique:users,email'],
            'password'=> ['required'],
            'newPassword'=> ['required', 'string', 'min:8'],
            'isAdmin' => ['bool'],
        ];
    }
    protected function attributesName():array
    {
        return [
            'newPassword'=> 'Новый пароль'
        ];
    }
}
