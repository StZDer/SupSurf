<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'point_id' => ['required', 'integer', 'max:20'],
            'role_id' => ['required', 'integer', 'max:20'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
            'point_id' => $data['point_id'],
            'role_id' => $data['role_id'],
        ]);
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
