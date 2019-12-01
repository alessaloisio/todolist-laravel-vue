<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{

  /**
   * Logout User
   *
   * @param Request $request * @return void
   * @return Response
   */
  public function logout(Request $request)
  {

      $user = $request->user;
      $user->api_token = null;
      $user->save();

      return response()->json([
          'message' => 'User Logged Out'
      ]);
      
  }


}