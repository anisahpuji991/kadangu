<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artist_data = Artist::orderBy('realname','DESC')->get();
        $response = [
            'message'=>'List data artist order by name',
            'data'=> $artist_data
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
            'realname' => ['required','min:3'],
            'phone' => ['required','integer']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        try{
            $artist_data = Artist::create($request->all());
            $response = [
                'message' => "Artist created",
                'data'=> $artist_data
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
        $artist_data = Artist::findOrFail($id);

        //SAMPLE SPESIFIC CALLING RELATIONSHIP
        // $persona_data = Artist::find($id)->persona()->where('id_artist', $id)->first();

        $response = [
            'message'=> ' Detail of artist resource',
            'data'=> $artist_data

        ];

        return response()->json($response, 200);
    }

    public function show_persona($id)
    {
        // $artist_data = Artist::findOrFail($id)->persona()->where('id_artist', $id)->get;

        //SAMPLE CALLING RELATION SHIP
        $personas = Artist::find($id)->persona;
        $array_personas = [];
        foreach ($personas as $persona) {
            array_push($array_personas,$persona);
        }

        $response = [
            'message'=> ' Detail of artist resource',
            'data'=> $array_personas

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
        $artist_data = Artist::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'realname' => ['required','min:3'],
            'phone' => ['required','integer']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        try{
            $artist_data->update($request->all());
            $response = [
                'message' => "Artist updated",
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
        $artist_data = Artist::findOrFail($id);

        try{
            $artist_data->delete();
            $response = [
                'message' => "Artist deleted"
            ];

            return response()->json($response, 200);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Failed '. $e->getMessage(),

            ]);
        }
    }
}
