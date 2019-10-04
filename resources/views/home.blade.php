@extends('layouts.master')

@section('content')
    <div class="container">
        <a href="{{ route('greet') }}">Greet</a>
        <a href="{{ route('hug') }}">Hug</a>
        <a href="{{ route('kiss') }}">Kiss</a>
    </div>
@endsection
