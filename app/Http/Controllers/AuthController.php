<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

	public function loginPage(Request $request)
	{

		if ($request->user()) {
			return redirect('/admin');
		}

		return view('login');
	}

	public function loginRequest(Request $request)
	{
		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();

			return redirect()->intended('/admin');
		}

		return back()->withErrors([
			'email' => 'The provided credentials do not match our records.',
		]);
	}
}
