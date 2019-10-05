<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;

use App\NiceAction;

class NiceActionController extends Controller{
    public function postInsertAction(Request $request){
        $this->validate($request,[
            'niceness'=>'required|numeric|unique:nice_actions',
            'name'=>'required|alpha'
        ]);
        $action = new NiceAction();
        $action->name=ucfirst(strtolower($request['name']));
        $action->niceness=$request['niceness'];
        $action->save();
        $actions= NiceAction::all();
        return redirect()->route('home',['actions'=>$actions]);
    }
    public function getHome(){
        $actions= NiceAction::all();
        return view('home',['actions'=>$actions]);
    }
    public function getNiceAction($action,$name=null){
        if($name===null){
            $name='you';
        }
        return view('actions.nice',['action'=>$action, 'name'=>$name]);
    }
    private function transformName($name){
        $prefix='KING ';
        return $prefix.strtoupper($name);
    }
}
