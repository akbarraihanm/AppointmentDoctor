<?php

namespace App\Http\Controllers;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::select('id','nama','alamat')->get();
        if($teams){
          return response()->json([
          'status'=>'success',
          'data'=>$teams],200);
        }
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
        //
        $this->validate($request,[
          'nama' => 'required',
          'alamat' => 'required',
          'telp' => 'required'
        ]);

        if(Team::create($request->all())){
          return response()->json([
            'status' => 'success',
            'message' => 'Data has been created'
          ],201);
        }
        else{
          return response()->json([
            'status' => 'error',
            'message' => 'Internal server error'
          ], 500);
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
        //
        $team = Team::find($id);
        if($team){
          return response()->json([
            'status' => 'success',
            'data' => $team->select('id','nama','alamat')->where('id',$id)->get()
          ]);
        }
        return response()->json([
          'status'=>'error',
          'message'=>'Data not found'
        ], 404);
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
        $team = Team::find($id);
        if($team){
          $team->update($request->all());
          return response()->json([
            'status'=>'success',
            'message'=>'Data has been updated'
          ]);
        }
        return response()->json([
          'status'=>'error',
          'message'=>'Cant updating data'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $team = Team::find($id);
        if($team){
          $team->delete();
          return response()->json([
            'status'=>'success',
            'message'=>'Data has been deleted'
          ]);
        }
        return response()->json([
          'status'=>'error',
          'message'=>'Cant deleting data'
        ], 400);
    }
}
