@extends('layouts.master')

@section('content')
    <div class="container">
        @foreach($actions as $action)
            <a href="{{ route('niceaction',['action'=>lcfirst($action->name )] ) }}">{{ $action->name }}</a>
        @endforeach
        <br>
        @if(count($errors)>0)
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('add_action') }}" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"  class="form-control"/>
                <label for="niceness">Niceness</label>
                <input type="text" name="niceness" id="niceness" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-danger">Send</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token"/>
        </form>
    </div>
@endsection
