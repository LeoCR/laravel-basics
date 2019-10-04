@extends('layouts.master')
@section('content')
    <div class="centered">
        <a href="{{ route('home') }}" class="btn btn-success">Back</a>
        <h1>I {{ $action }}  {{ $name }}</h1>
    </div>
@endsection
