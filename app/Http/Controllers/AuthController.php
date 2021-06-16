<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;        //for passwords


class AuthController extends Controller
{
    public function register(Request $request) {

                $fields = $request->validate([
                    'name' => 'required|string',                       //getting body from the response
                    'email' => 'required|string|unique:users,email',
                    'password' => 'required|string|confirmed'

                ]);


                $user = User::create([                  //creating the user
                    'name' => $fields['name'],
                    'email' => $fields['email'],
                    'password' => bcrypt($fields['password'])            //provies the hash encrypted password

                ]);

                $token = $user->createToken('myapptoken')->plainTextToken;              //creating the user token

                $response = [

                    'user' => $user,                //user from the database
                    'token' => $token 


                ];
                    return response($response, 201);            //201 means everything is successful and something was created


    }


    public function login(Request $request) {

                $fields = $request->validate([
                                                             //getting body from the response
                    'email' => 'required|string',
                    'password' => 'required|string'

                ]);


                        //checks the email
                    $user = User::where('email', $fields['email'])->first();

                    //check password

                    if(!$user || !Hash::check($fields['password'], $user->password)) {

                        return response([
                            'message' => 'Bad Creds'          //creds-> credentials
                        ], 401);                // 401 means unauthorized
                    }
               



                $token = $user->createToken('myapptoken')->plainTextToken;              //creating the user token

                $response = [

                    'user' => $user,                //user from the database
                    'token' => $token 


                ];
                    return response($response, 201);            //201 means everything is successful and something was created


    }


    public function logout(Request $request){

        auth()->user()->tokens()->delete();

        return [
            'message' => 'successfully logged out'

        ];
    }
}


