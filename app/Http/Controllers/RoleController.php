<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_data = Role::orderBy('name','DESC')->get();
        $response = [
            'message'=>'List data role order by name',
            'data'=> $role_data
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
        $validator = Validator::make($request->all(),[
            'name' => ['required','min:3']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        try{
            $role_data = Role::create($request->all());
            $response = [
                'message' => "Role created",
                'data'=> $role_data
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
        $role_data = Role::findOrFail($id);
        $response = [
            'message'=> ' Detail of role resource',
            'data'=> $role_data
        ];

        return response()->json($response, 200);
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
        $role_data = Role::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => ['required','min:3']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        try{
            $role_data->update($request->all());
            $response = [
                'message' => "Role updated",
                'data'=> $artist_data
            ];

            return response()->json($response, 200);

        } catch(\Exception $e){
            return response()->json([
                'message' => 'Failed '. $e->getMessage(),

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_data = Role::findOrFail($id);

        try{
            $role_data->delete();
            $response = [
                'message' => "Role deleted"
            ];

            return response()->json($response, 200);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Failed '. $e->getMessage(),

            ]);
        }
    }
}
