<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;
class MessagesController extends Controller{
    public function show(Message $message){
        /** is a bu */
       // $message =Message::find($id);
        return view('messages.show',[
            'message'=>$message 
        ]);
    }
    public function create(CreateMessageRequest $request){
        //dd($request->all());
        $image=$request->file('image');
        //return 'Created!';
        $user=$request->user();
        $message = Message::create([
        'user_id'=>$user->id,
        'content' => $request->input('message'),
        'image' => $image->store('messages','public')
    ]);
    return redirect('/messages/'.$message->id);
            ///*$this->validate($request);*/
    }
    public function search(Request $request){
        $query = $request->input('query');
        /*$messages = Message::with('user')->where('content', 'LIKE', '%'.$query.'%')->get();*/
        $messages = Message::search($query)->get();
        $messages->load('user');
        return view('messages.index', [
            'messages' => $messages,
        ]);
    }
    public function responses(Message $message){
        return $message;
    }
}
