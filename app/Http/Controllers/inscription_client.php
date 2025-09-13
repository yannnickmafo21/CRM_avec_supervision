<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Models\Client;


class inscription_client extends Controller
{
    public function inscription_client(Request $request)
    {
        $client = Client::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->mot_de_passe),
        ]);

        $token = JWTAuth::fromUser($client);

        $client->token = $token;
        $client->save();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);

    }

    public function getClient(Request $request)
    {
        return response()->json(['client' => auth('client')->user()]);
    }
}
