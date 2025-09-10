@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    <div style="max-width: 600px; margin:auto;">
        <div class="card mb-3">
            <div class="card-header">Post Info</div>
            <div class="card-body">
                <h1 class="card-title">{{ $post->title }}</h1>
                <h3 class="card-title">{{ $post->user->name }}</h3>
                <h4 class="card-title">{{ $post->user->email }}</h4>
                <p class="card-text">{{ $post->description }}</p>
                <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
