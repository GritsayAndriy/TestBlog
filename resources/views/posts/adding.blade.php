@extends('layout.main')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="
        @if(isset($post))
            {{ url('update') }}
        @else
            {{ url('add') }}
        @endif
        " method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="titleInput">Title</label>
            @if(isset($post))
            <input type="hidden" name="id" value=" {{ $post->id }} ">
            @endif
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="titleInput"
                   value=" {{ $post->title ?? (old('title')) }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="descriptionTextarea">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                      id="descriptionTextarea" rows="4">{{$post->description ??  (old('description')) }}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="contentTextarea">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="contentTextarea"
                      rows="10">{{$post->content ?? (old('content')) }}</textarea>
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            @if (isset($post))
                Update post
            @else
                Add post
            @endif
        </button>
    </form>
    <br>
@endsection
