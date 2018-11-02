<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;

class PagesController extends Controller{
    public function home(){
        $links=[
            'https://laravel.com/docs'=>'Documentation',
            'https://laracasts.com'=>'Laracasts',
            'https://laravel-news.com'=>'News',
            'https://forge.laravel.com'=>'Forge',
            'https://github.com/laravel/laravel'=>'GitHub'
        ];
        $messages = Message::latest()->paginate(10);
        //$messages =Message::all();
       // dd($messages);
        //var_dump($messages);
        /*
        $messages = [
            [
                'id' => 1,
                'content' => 'Este es mi primer mensaje!',
                'image' => 'http://lorempixel.com/600/338?1',
            ],
            [
                'id' => 2,
                'content' => 'Este es mi segundo mensaje!',
                'image' => 'http://lorempixel.com/600/338?2',
            ],
            [
                'id' => 3,
                'content' => 'Otro mensaje más!',
                'image' => 'http://lorempixel.com/600/338?3',
            ],
            [
                'id' => 4,
                'content' => 'El ultimo mensaje!',
                'image' => 'http://lorempixel.com/600/338?4',
            ],
        ];*/
        return view('welcome',[
            'framework'=>'Laravel','messages' => $messages,
            'links'=>$links
            ]);
    }
}
