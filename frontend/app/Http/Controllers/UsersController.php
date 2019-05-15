<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use GuzzleHttp\HandlerStack;
use GuzzleRetry\GuzzleRetryMiddleware;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Making a client request by creating new instance of client
        $client = new Client();
        // 1st param is the API route, 2nd param where we attached the body PHP ARRAY format
        $response = $client->get('http://localhost:3000/api/users');

        // Getting the body from $response and convert to PHP ARRAY
        $users = json_decode($response->getBody());

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Making a client request by creating new instance of client
        $client = new Client();
        // 1st param is the API route, 2nd param where we attached the body PHP ARRAY format
        $response = $client->post('http://localhost:3000/api/users', [
                'json' => [
                    "name" => $request->name, 
                    "email" => $request->email,
                    "password" => $request->password
                ]
        ]);

        $user = json_decode($response->getBody());
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Making a client request by creating new instance of client
        $client = new Client();
        // 1st param is the API route, 2nd param where we attached the body PHP ARRAY format
        $response = $client->get("http://localhost:3000/api/users/" . $id);

        // Getting the body from $response and convert to PHP ARRAY
        $user = json_decode($response->getBody());

        // dd($user->name);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stack = HandlerStack::create();
        
        $stack->push(GuzzleRetryMiddleware::factory());

        $client = new Client([$stack]);
     
        // 1st param is the API route, 2nd param where we attached the body PHP ARRAY format
        $response = $client->put("http://localhost:3000/api/users/" . $id, [
                'json' => [
                    "name" => $request->name, 
                    "email" => $request->email,
                    "password" => $request->password
                ],

                'headers' =>[
                    "x-auth-token" => Session::get('token')
                ]
        ]);
        
        
        // $user = json_decode($response->getBody());
        return redirect('/users')->with('success', 'User is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Making a client request by creating new instance of client
        $client = new Client();
        // 1st param is the API route, 2nd param where we attached the body PHP ARRAY format
        $response = $client->delete("http://localhost:3000/api/users/" . $id, [
            'headers' =>[
                    "x-auth-token" => Session::get('token')
                ]
        ]);

        return redirect('/users');
    }
}
