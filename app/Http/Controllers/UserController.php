<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = User::orderBy('name','DESC')->get();
        $response = [
            'message'=>'List data user order by name',
            'data'=> $user_data
        ];

        return response()->json($response,200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'name' => ['required'],
        //     'email' => ['required']
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors(),422);
        // }

        try{
            $user_data = User::create($request->all());
            $response = [
                'message' => "User created",
                'data'=> $user_data
            ];

            return response()->json($response, 201);

        } catch(\Exception $e){
            return response()->json([
                'message' => 'Failed '. $e->getMessage(),

            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_data = User::findOrFail($id);
        $response = [
            'message'=> ' Detail of user resource',
            'data'=> $user_data
        ];

        return response()->json($response, 200);


        //
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
        $user_data = User::findOrFail($id);

        // $validator = Validator::make($request->all(),[
        //     'name'=>['required'],
        //     'email'=>['required']
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors(),422);
        // }

        try{
            $user_data->update($request->all());
            $response = [
                'message' => "User updated",
                'data'=> $user_data
            ];

            return response()->json($response, 200);

        } catch(\Exception $e){
            return response()->json([
                'message' => 'Failed '. $e->getMessage(),

            ]);
        }


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user_data = User::findOrFail($id);

        try{
            $user_data->delete();
            $response = [
                'message' => "User deleted"
            ];

            return response()->json($response, 200);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Failed '. $e->getMessage(),

            ]);
        }

    }
}
