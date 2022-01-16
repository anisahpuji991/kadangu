<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona_data = Persona::orderBy('alias_name','DESC')->get();
        $response = [
            'message'=>'List data persona order by name',
            'data'=> $persona_data
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
            'alias_name' => ['required','min:3']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        try{
            $persona_data = Persona::create($request->all());
            $response = [
                'message' => "Persona created",
                'data'=> $persona_data
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
        $persona_data = Persona::findOrFail($id);

        //relation calling-sample
        //$persona_data = Persona::find($id)->artist->realname;
        $response = [
            'message'=> ' Detail of artist resource',
            'data'=> $persona_data
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
        $persona_data = Persona::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'alias_name' => ['required','min:3']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        try{
            $persona_data->update($request->all());
            $response = [
                'message' => "Persona updated",
                'data'=> $persona_data
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
        $persona_data = Persona::findOrFail($id);

        try{
            $persona_data->delete();
            $response = [
                'message' => "Persona deleted"
            ];

            return response()->json($response, 200);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Failed '. $e->getMessage(),

            ]);
        }
    }
}
