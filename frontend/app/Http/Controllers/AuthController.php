<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {

    	// Making a client request by creating new instance of client
        $client = new Client();
        // 1st param is the API route, 2nd param where we attached the body PHP ARRAY format
        $response = $client->post('http://localhost:3000/api/auth', [
                'json' => [
                    "email" => $request->email,
                    "password" => $request->password
                ]
        ]);

		$header = $response->getHeaders('x-auth-token');
        // dd($header['x-auth-token'][0]);
        Session::put('token', $header['x-auth-token'][0]);

        return redirect()->route('home');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('home');
    }
}
