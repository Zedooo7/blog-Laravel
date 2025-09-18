<!-- resources/views/admin/posts.blade.php -->
@extends('layouts.app')

@section('content')
<h2>All Posts</h2>

@if(session('success')) <div style="color:green">{{ session('success') }}</div> @endif

<table border="1" cellpadding="8" cellspacing="0">
    <thead><tr><th>ID</th><th>Title</th><th>User</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->user?->name }}</td>
            <td>{{ $post->status }}</td>
            <td>
                @if($post->status !== 'approved')
                <form action="{{ route('admin.posts.approve', $post->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit">Approve</button>
                </form>
                @endif

                @if($post->status !== 'rejected')
                <form action="{{ route('admin.posts.reject', $post->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit">Reject</button>
                </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
