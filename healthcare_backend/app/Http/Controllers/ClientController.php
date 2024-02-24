<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Client;
use App\Models\User;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){

        $email = Client::where("email" , $request->email)->first();

        if(!empty($email)){
            return response()->json(["message"=>"another account already exist with this email" , "status"=>"400"]) ;
        }else {
            $client = new Client ;
            $client->first_name = $request->first_name;
            $client->last_name = $request->last_name;
            $client->email = $request->email;
            $client->password = bcrypt($request->password) ;
            $client->save();
        return response()->json(["message"=>"your register done with succes" , "status"=>"201"]);
        }


    }

    public function login(Request $request){
        $client = Client::where("email" , $request->email)->first();
        if(!$client){
            return response()->json(["message"=>"there is no account with this email" , "status"=>"404" ]);
        }else if(!Hash::check($request->password ,$client->password)){
            return response()->json(["message"=>"wrong password" , "status"=>"400"]) ;
        }else{
            $token = Str::random(60);
            $hashedToken = hash('sha256' , $token) ;
            $client->token = $hashedToken;
            $client->save();
        }
        return response()->json(["message"=>"login with succes" , "status"=>"200" ,"client" => $client , "token"=>$client->token ]) ;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
