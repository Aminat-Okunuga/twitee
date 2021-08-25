@extends('layouts.app')

@section('content')
<a href="/posts" class='btn btn-default'>Go Back</a>

<h3>{{$post->title}}</h3>
<div class="row">
    <div class="col-md-12">
        <img style="width:50%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
    </div>
</div>
<p>{{$post->body}}</p>
<hr>
<p>Author: {{$post->user_name}}</p>
<small>Written on: {{$post->created_at}}<small>
<hr>
@if (!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
        {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif
@endif
@endsection 