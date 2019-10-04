@extends('layouts.master')
@section('content')
<h1>I greet you  {{ $name ===null ? 'you': $name }}</h1>
@endsection
