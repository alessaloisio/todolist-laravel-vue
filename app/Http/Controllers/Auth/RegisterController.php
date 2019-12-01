<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLogin;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Http\Requests\RequestRegister;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\User;

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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    /**
     * Login User
     *
     * @param RequestRegister $request
     * @return Response
     */
    public function register(RequestRegister $request) {

        $credentials = $request->only(['name', 'email', 'password']);

        $result = $this->create($credentials);

        if($result) {
            return response()->json($result);
        }

        return response()->json([
            'data' => 'Something wrong, try again'
        ], 422);

    }
}
