@extends('layouts.app')

@section('content')
<h1 style="text-align:center">{{$heading}}</h1>
<h3 style="text-align:center">{{$sub_heading}}</h3>
       <ul style="text-align:center">
            @if(count($posts) > 0)
                @foreach ($posts as $post )
                    <li>{{$post}}</li>
                @endforeach
            @endif
        </ul>
@endsection
