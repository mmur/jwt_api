<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;

class AuthenticateController extends Controller
{
	public function __construct()
	{
		$this->middleware('jwt.auth', ['except' => ['authenticate']]);
	}

	public function index()
	{
		$users = User::all();
		return $users;
	}
	


	public function authenticate(Request $request)
	{
		$emailAndPassword = $request->only('email', 'password');

		try {
			if(! $token = JWTAuth::attempt($emailAndPassword)) {
				return response()->json(['error' => 'wrong email or passs'], 401);
			}
		} catch(JWTException $e) {
			return response()->json(['error' => 'wtf?'], 500);
		}
		// $token-г буцаана
		return response()->json(compact('token'));
	}
}
