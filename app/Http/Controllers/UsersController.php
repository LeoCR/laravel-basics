<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\PrivateMessage;
use App\Conversation;
use App\Notifications\UserFollowed;
class UsersController extends Controller{
    public function show($username){
        ///throw new \Exception("Simulando un error");
        $user =$this->findByUsername($username);
        return view('users.show',[
            'user'=>$user
        ]);
    }
    public function follow($username,Request $request){
        $user =$this->findByUsername($username);
        $me=$request->user();
        $me->follows()->attach($user);
        ///$user->notify(new UserFollowed($me));
        return redirect("/$username")->withSuccess('Usuario seguido! ');
    }
    public function unfollow($username,Request $request){
        $user =$this->findByUsername($username);
        $me=$request->user();
        $me->follows()->detach($user);
        return redirect("/$username")->withSuccess('Usuario no seguido! ');
    }
    public function follows($username){
        $user =$this->findByUsername($username);
        return view('users.follows',[
            'user'=>$user ,
            'follows'=>$user->follows,
        ]);
    }
    public function followers($username){
        $user =$this->findByUsername($username);
        return view('users.follows',[
            'user'=> $user ,
            'follows'=>$user->followers,
        ]);
    }
    private function findByUsername($username){
        return User::where('username',$username)->firstOrFail();
    }
    public function sendPrivateMessage($username,Request $request){
        $user=$this->findByUsername($username);
        $me=$request->user();
        $message=$request->input('message');

        $conversation=Conversation::between($me,$user);
/*
        $conversation=Conversation::create();
        $conversation->users()->attach($me);
        $conversation->users()->attach($user);*/

        $privateMessage=PrivateMessage::create([
            'conversation_id'=>$conversation->id,
            'user_id'=>$me->id,
            'message'=>$message
        ]);
        return redirect('/conversations/'.$conversation->id);  
    }
    public function showConversation(Conversation $conversation){
        $conversation->load('users','privateMessages'); 
        return view('users.conversation',[
            'conversation'=>$conversation,
            'user'=>auth()->user()
        ]);
        //dd($conversation);
    }
}
