<?php

namespace App\Http\Controllers;

use App\Userapp;
use Hash;
use Illuminate\Http\Request;

class UserappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = Userapp::where('username',$username)->first();

        if($user){
            if(Hash::check($password, $user->password)){
                return response()->json($user,200);
            }else {
                $response = [
                    'message' => 'Username atau password salah!'
                ];            
                return response()->json($response,401);
            }
        } else {
            $response = [
                'message' => 'Username atau password salah!'
            ];            
            return response()->json($response,401);
        }
        
    }

    public function register(Request $request)
    {   
        // return $request;die;
        $password = Hash::make($request->password);
        Userapp::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'telepone' => $request->telepone,
            'kendaraan' => $request->kendaraan,
            'password' => $password
        ]);
        $response =[
            'message' => 'Berhasil mendaftar!'
        ];
        return response()->json($response,201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Userapp  $userapp
     * @return \Illuminate\Http\Response
     */
    public function show(Userapp $userapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Userapp  $userapp
     * @return \Illuminate\Http\Response
     */
    public function edit(Userapp $userapp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Userapp  $userapp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userapp $userapp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Userapp  $userapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userapp $userapp)
    {
        //
    }
}
