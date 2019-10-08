<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Trainer;

class TrainerController extends Controller{
    protected $trainer;
    /**
     * @param Request $request
     * @param Trainer $trainer
     */
    public function __construct(Request $request, Trainer $trainer) {
        $this->request = $request;
        $this->trainer = $trainer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $trainer=Trainer::all();
        return view('home',[
            'trainers'=>$trainer
        ]);
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
        try {
            $trainer = new Trainer();
            $trainer->name = $request->name;
            $trainer->save();

            return response()->json([
                "message" => "Trainer created"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => "An error occurs",
                "message"=>$th->getMessage()
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $trainer = Trainer::where('id', $id);
        try {
            if ($trainer->exists()) {
                $data=$trainer->get();
                return response()->json([
                    "trainer" => $data
                  ], 202);
            }
            else {
                return response()->json([
                  "message" => "Trainer not found"
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "error" => "An error occurs",
                "message"=>$th->getMessage()
            ], 200);
        }
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
        if (Trainer::where('id', $id)->exists()) {
            $trainer = Trainer::find($id);
            $trainer->name = is_null($request->name) ? $trainer->name : $request->name;
            $trainer->save();
            return response()->json([
                "message" => "Trainer updated successfully",
                "trainer"=>$trainer
            ], 200);
        }
        else {
            return response()->json([
                "message" => "Trainer not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if(Trainer::where('id', $id)->exists()) {
            $trainer = Trainer::find($id);
            $trainer->delete();

            return response()->json([
              "message" => "Trainer deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Trainer not found"
            ], 404);
          }
    }
}
