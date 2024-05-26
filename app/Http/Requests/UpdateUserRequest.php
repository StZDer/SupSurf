<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'point_id' => ['required', 'integer', 'max:20'],
            'role_id' => ['required', 'integer', 'max:20'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Поле имени является обязательным для заполнения',
            'surname.required' => 'Поле фамилии является обязательным для заполнения',
            'patronymic.required' => 'Поле отчества является обязательным для заполнения',
            'login.required' => 'Поле логина является обязательным для заполнения',
            'password.required' => 'Поле пароля является обязательным для заполнения',
            'point_id.required' => 'Поле точки является обязательным для заполнения',
            'role_id.required' => 'Поле роли является обязательным для заполнения',
        ];
    }
}
