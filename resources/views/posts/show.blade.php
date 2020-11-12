@extends('layouts.app')

@section('content')
<a href="/lsapp/public/posts" class="btn btn-default"> Go Back </a>
<h1> {{$post->title}} </h1>

<div>
{{$post->body}}
</div>

<small> written on {{$post->created_at}} </small>
<hr>
@if(!Auth::guest())
<a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
{!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-xs-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
@endif

@endsection