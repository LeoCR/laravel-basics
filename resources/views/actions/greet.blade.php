@extends('layouts.master')
@section('content')
    <div class="centered">
        <a href="{{ route('home') }}"></a>
        <h1>I greet you  {{ $name ===null ? 'you': $name }}</h1>
    </div>
@endsection
