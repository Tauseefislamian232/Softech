<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
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
    public function create(Request $request)
    {
        $data = [
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=>bcrypt($request->password),
            "confirm_password"=> $request->confirm_password,
            "phone"=> $request->phone,
            "address"=> $request->address,
            "image"=> $request->image,
        ];

        $user = User::create($data);

        $token =$user->createToken('softech')->accessToken;
        $user->token = $token;

        return response()->json(
            [

            'data'=> [

                "status" => true,
                "message" => "Record added Successfully",
                 "data" => $user
                // "data" => $request->all()
                ]
            ],
            200
        );

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = User::all();

        return response()->json(
            [

            'data'=> [

                "status" => true,
                "message" => "Data Retrieved Successsfully",
                 "data" => $user
                // "data" => $request->all()
                ]
            ],
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $user =User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->confirm_password = $request->confirm_password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->image = $request->image;
        // $user = Input::all();
        $user->save();

        return response()->json(
            [

            'data'=> [

                "status" => true,
                "message" => "success",
                 "data" => $user
                // "data" => $request->all()
                ]
            ],
            200
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(
            [

            'data'=> [

                "status" => true,
                "message" => "success",
                 "data" => "Successfully Deleted!"
                // "data" => $request->all()
                ]
            ],
            200
        );

    }
}
