@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div class="row">
        <div class="col-md-12">
            @if ($post->cover_image && file_exists(public_path("storage/cover_images/{$post->cover_image}")))
                <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
            @else
                <img style="width: 100%" src="/storage/cover_images/no_image.jpeg" alt="No Image">
            @endif
        </div>
    <p>{{$post->body}}</p>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
