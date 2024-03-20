@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Article</h1>

        <form action="{{ route('articles.update', $article) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $article->title }}">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="form-control">{{ $article->body }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Article</button>
        </form>
    </div>
@endsection
