<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUserUpdate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Show User
     *
     * @param Request $request * @return void
     * @return Response
     */
    public function show(Request $request)
    {
      return response()->json($request->user);
    }

    /**
     * Show User
     *
     * @param RequestUserUpdate $request * @return void
     * @return Response
     */
    public function update(RequestUserUpdate $request)
    {

        $user = $request->user;

        if(!empty($request->name)) $user->name = $request->name;
        if(!empty($request->email) && $request->email !== $user->email) {

            $result = User::where('email', $request->email)->get()->first();

            if($result) {
                return response()->json(['data'=>'Email already used'], 422);
            } else {
                $user->email = $request->email;
            }
        }
        if(!empty($request->password)) $user->password = bcrypt($request->input('password'));

        $result = $user->save();

        if($result)
            return response()->json(['data' => 'User updated']);

    }
}
