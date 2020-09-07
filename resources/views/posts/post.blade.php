@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
                <p class="blog-post-meta">{{ $post->created_at }}</p>
                <p class="blog-post-meta">{{ $post->description }}</p>
                <p>{{ $post->content }}</p>
            </div>
        </div>
    </div>
    <div>
        <a class="btn btn-primary" href="/updating_post{{$post->id}}">Update</a>
        <a class="btn btn-danger" href="/destroy{{$post->id}}">Delete</a>
    </div>
@endsection
