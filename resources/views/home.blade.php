@extends('layouts.master')

@section('content')
    <div class="container">
        <a href="{{ route('niceaction',['action'=>'greet']) }}">Greet</a>
        <a href="{{ route('niceaction',['action'=>'hug']) }}">Hug</a>
        <a href="{{ route('niceaction',['action'=>'kiss']) }}">Kiss</a>
        <form action="{{ route('post_action') }}" method="post">
            <div class="form-group">
                <label for="select-action">Select an Action</label>
                <select id="select-action" name="action" class="form-control col-lg-4">
                    <option value="greet">Greet</option>
                    <option value="hug">Hug</option>
                    <option value="kiss">Kiss</option>
                </select>
                <input type="text" name="name" />
            </div>
            <button type="submit">Send</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token"/>
        </form>
    </div>
@endsection
