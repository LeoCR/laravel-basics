@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
	<h1>Laratter</h1>
	<nav>
		<ul class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link" href="/">Home</a>
			</li>
		</ul>
	</nav>
</div>
<div class="title m-b-md">
    @if(isset($framework))
        <p> {{$framework}}</p>
    @endif
</div> 
<div class="row">
	<form action="/messages/create" method="post" enctype="multipart/form-data">
		<div class="form-group @if($errors->has('message')) has-danger @endif">
			{{ csrf_field() }}
			<input type="text" name="message" class="
			@if($errors->has('message')) is-invalid @endif
			form-control" placeholder="Qué estás pensando?">
			@if ($errors->has('message'))
			{{-- @if ($errors->any()) --}} 
				@foreach ($errors->get('message') as $error)
				<div class="invalid-feedback form-control-feedback">{{ $error }}</div>
				@endforeach
			@endif
			<input type="file" class="form-control-file" name="image"/>
		</div>
	</form>
</div>
<div class="row">
	@forelse($messages as $message)
		<!-- <div class="col-6">
			<img class="img-thumbnail" src="{{ $message['image'] }}">
			<p class="card-text">
				{{ $message['content'] }}
				<a href="/messages/{{ $message['id'] }}">Leer más</a>
			</p>
		</div> -->
		<div class="col-6">
			@include('messages.message')
		</div>
	@empty
		<p>No hay mensajes destacados.</p>
	@endforelse
	@if(count($messages))
		<div class="mt-s mx-auto">
			{{$messages->links('pagination::bootstrap-4')}}
		</div>
	@endif
</div>


<div class="links">
    @foreach($links as $link=>$text)
    <a href="{{$link}}">{{$text}}</a>
    @endforeach
</div>
@endsection