@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts)>0)
    <div class="card">
        <ul class="list-group list-group-flush">
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-4">
                @if ($post->cover_image && file_exists(public_path("storage/cover_images/{$post->cover_image}")))
                    <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                @else
                    <img style="width: 100%" src="/storage/cover_images/no_image.jpeg" alt="No Image">
                @endif
            </div>
            <div class="col-md-8">

                    <h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
                    <small>Written on {{$post->created_at}}</small>

            </div>
        </div>

        @endforeach
        </ul>
    </div>
    @else

    @endif
@endsection
