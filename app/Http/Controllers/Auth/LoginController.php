<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\RequestLogin;
use App\User;

class LoginController extends Controller
{

    private $apiToken;

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:api');
        $this->apiToken = substr(uniqid(base64_encode(Str::random(80))), 0, 80);
    }

    /**
     * Login User
     *
     * @param RequestLogin $request
     * @return Response
     */
    public function login(RequestLogin $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (password_verify($request->password, $user->password)) {

                // Update Token
                $login = User::where('email', $request->email)
                    ->update(['api_token' => $this->apiToken]);

                $credentials = $request->only(['email', 'password']);
                
                if ($login && Auth::attempt($credentials)) {
                    // dd($request->user());
                    return response()->json([
                        'data' => auth()->user()
                    ]);
                }

            } else {
                return response()->json(['password' => 'Invalid Password'], 422);
            }
        } else {
            return response()->json(['email' => 'User not found'], 422);
        }
    }
}
