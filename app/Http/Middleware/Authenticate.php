<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param array $guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if($request->header('Authorization')){

            $token = $request->header('Authorization');

            $user = User::where('api_token', $token)->first();

            if($user) {
                $request['user'] = $user;
                return $next($request);
            }

            return response()->json([
                'message' => 'User not found'
            ], 422);
        }

        return response()->json([
            'message' => 'Not a valid API request.',
        ], 422);
    }
}
