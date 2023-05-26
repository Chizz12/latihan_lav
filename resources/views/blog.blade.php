@extends('layouts.app')

@section('content')

<div class="container">

    <div class="title">
        <h3>
            {{ $post->title ?? ''}}
        </h3>
    </div>
    <div class="body">{!! $post->body !!}</div>
    <span>Author : {{$post->user->name}}</span>

</div>




@endsection