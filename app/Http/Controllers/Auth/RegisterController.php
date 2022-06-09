<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
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
    
    //protected $redirectTo = '/home';
    protected $redirectTo = '/account';

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
            'name' => ['required', 'string', 'max:20', 'regex:/^([A-Z])+([A-Za-z àèéìòù])+$/'],
            'surname' => ['required', 'string', 'max:20', 'regex:/^([A-Z])+([A-Za-z àèéìòù])+$/'],
            'username' => ['required', 'string', 'min:8', 'max:20', 'unique:users', 'regex:/^([A-Za-z0-9_\-\.\@])+$/'],
            'password' => ['required', 'string', 'min:8', 'max:30', 'confirmed'],
            'role' => ['required', 'string'],
            'genere' => ['required', 'string'],
            'telefono' => ['nullable', 'string', 'min:10', 'max:15', 'regex:/^((00|\+)39[\. ]??)??3\d{2}[\. ]??\d{6,7}$/'],
            'comune_residenza' => ['nullable', 'string', 'max:25', 'regex:/^([A-Z])+([A-Za-z àèéìòù\(\)\'])+$/'],
            'data_nascita' => ['required', 'date_format:Y-m-d', 'after:1900-01-01', 'before:2010-01-01'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'genere' => $data['genere'],
            'telefono' => $data['telefono'],
            'comune_residenza' => $data['comune_residenza'],
            'data_nascita' => $data['data_nascita'],
        ]);
    }
}
